<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Categorie;
use App\Models\Contact;
use App\Models\Staff;
use App\Models\Ticket;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    // Assuming you have a Task model
    public function showTask()
    {
        $cat = new Categorie;
        $cat = Categorie::all(); // Fetch all users from the database

        $con = new Contact;
        $con = Contact::all();

        $task = DB::table('tasks')
            ->select('tasks.*', 'categories.cat_name as category_name', 'staffs.name as staff_name', 'contacts.office_name as person_name')
            ->join('categories', 'tasks.category_id', '=', 'categories.id')
            ->join('staffs', 'tasks.staff_id', '=', 'staffs.id')
            ->join('contacts', 'tasks.person_id', '=', 'contacts.id')
            ->get();


        // Pass data to the view
        return view('task', ['categorie' => $cat, 'contact' => $con, 'tasks' => $task]);
    }

    public function addtask(Request $request)
    {


        // Create a new Task instance
        $task = new Task();
        $task->name = $request->input('name');
        $task->number = $request->input('number');
        $task->category_id = $request->input('category');
        $task->person_id = $request->input('person');
        $task->size = $request->input('size');
        $task->description = $request->input('description');
        $task->staff_id = $request->input('staff');

        // Handle file upload if present
        if ($request->hasFile('taskfile')) {
            $file = $request->file('taskfile');
            // Upload the file and store the file path in the database
            $filePath = $file->store('task_files');
            $task->file_path = $filePath;
        }

        // Save the task
        $task->save();

        // Redirect back with success message
        return redirect()->route('task')->with('message', 'Task added successfully.');
    }
    public function assignTask($id)
    {
        $task = Task::find($id);

        // Get all users who are not assigned to the task or have user_status of 0
        $users = Staff::whereNotIn('id', function ($query) use ($id) {
            $query->select('user')
                ->from('tickets')
                ->where('task_number', $id)
                ->where('user_status', 1); // Exclude users with user_status of 1
        })
            ->where('status', 1)
            ->where('type', 0)
            ->get();

        if ($users->isEmpty()) {
            return redirect()->back()->with('error', 'No available users to assign.');
        }

        return view('asssignTask', ['tasks' => $task, 'users' => $users]);
    }

    public function unassignTask($id)
    {
        // Find the tickets assigned to the task with user_status = 1
        $tickets = Ticket::where('task_number', $id)
            ->where('user_status', 1)
            ->get();

        // Initialize an array to store user names and IDs
        $users = [];

        // Iterate through the tickets
        foreach ($tickets as $ticket) {
            // Get the user details from the user ID
            $user = Staff::find($ticket->user);

            // Check if the user exists and add their name and ID to the array
            if ($user) {
                $users[] = [
                    'id' => $user->id,
                    'name' => $user->name,
                ];
            }
        }

        // Check if no users are found
        if (empty($users)) {
            return redirect()->back()->with('error', 'No users assigned to this task.');
        }

        // Pass the users data to the unassigned view
        return view('unassigned', ['users' => $users, 'id' => $id]);
    }
    public function edittask($id)
    {
        // Find the task details by ID
        $task = Task::find($id);

        // Check if the task exists
        if (!$task) {
            return redirect()->back()->with('error', 'Task not found.');
        }

        // Fetch all categories
        $categories = Categorie::all();

        // Fetch all contacts
        $contacts = Contact::all();

        // Fetch all tasks with related data
        $tasks = DB::table('tasks')
            ->select('tasks.*', 'categories.cat_name as category_name', 'staffs.name as staff_name', 'contacts.office_name as person_name')
            ->join('categories', 'tasks.category_id', '=', 'categories.id')
            ->join('staffs', 'tasks.staff_id', '=', 'staffs.id')
            ->join('contacts', 'tasks.person_id', '=', 'contacts.id')
            ->get();

        // Pass the task details, categories, contacts, and tasks to the taskedit view
        return view('taskedit', ['task' => $task, 'id' => $id, 'categories' => $categories, 'contacts' => $contacts, 'tasks' => $tasks]);
    }
    public function updatetask(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'number' => 'required|string|max:255',
            'category' => 'required|exists:categories,id',
            'person' => 'required|exists:contacts,id',
            'size' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Find the task by ID
        $task = Task::find($request->input('task_id'));

        // Update task details
        $task->name = $request->input('name');
        $task->number = $request->input('number');
        $task->category_id = $request->input('category');
        $task->person_id = $request->input('person');
        $task->size = $request->input('size');
        $task->description = $request->input('description');

        // Check if a new file is selected
        if ($request->hasFile('taskfile')) {
            // Store the new file
            $file_path = $request->file('taskfile')->store('task_files');
            // Update the file path in the database
            $task->file_path = $file_path;
        }

        // Save the updated task
        $task->save();

        // Redirect back with a success message
        return redirect()->route('task')->with('message', 'Task updated successfully.');

    }

}
