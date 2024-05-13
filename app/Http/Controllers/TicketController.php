<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Task;

class TicketController extends Controller
{
    public function addticket(Request $request)
    {


        $user_ids = $request->input('user_ids');


        // Iterate through each user ID
        foreach ($user_ids as $user_id) {
            // Create a new Ticket instance for each user ID
            $ticket = new Ticket();

            // Assign the current user ID to the ticket
            $ticket->user = $user_id;

            // Assign other fields as needed
            $ticket->task_number = $request->input('task_id');
            $ticket->description = $request->input('description');
            $ticket->status = 'Assigned';

            // Save the ticket entry
            $ticket->save();
            $task = new Task();
            Task::where('id', $request->input('task_id'))->update(['status' => 1]);
            return redirect()->route('task')->with('message', 'Ticket assigned successfully.');
        }

    }
    public function showTickets()
    {
        $tickets = Ticket::select('tickets.status', 'tickets.user', 'tickets.id', 'tickets.description', 'staffs.name', 'staffs.lname', 'tasks.name as task_name', 'tasks.number', 'tasks.size', 'tasks.file_path', 'categories.cat_name')
            ->join('staffs', 'tickets.user', '=', 'staffs.id')
            ->join('tasks', 'tickets.task_number', '=', 'tasks.id')
            ->join('categories', 'tasks.category_id', '=', 'categories.id')
            ->orderBy('tickets.id')
            ->get();
        return view('ticket')->with('ticket', $tickets);
    }
    public function viewTicket($id)
    {
        $tickets = Ticket::select('tickets.status', 'tickets.id', 'tickets.description', 'staffs.name', 'staffs.lname', 'tasks.name as task_name', 'tasks.number', 'tasks.size', 'tasks.file_path', 'categories.cat_name')
            ->join('staffs', 'tickets.user', '=', 'staffs.id')
            ->join('tasks', 'tickets.task_number', '=', 'tasks.id')
            ->join('categories', 'tasks.category_id', '=', 'categories.id')
            ->where('tickets.id', $id) // Filter by ticket ID
            ->orderBy('tickets.id')
            ->get();

        return view('viewTicket')->with('ticket', $tickets);
    }
    public function unassignedusers(Request $request)
    {
        // Validate the form data
        $request->validate([
            'user_ids' => 'required|array', // Ensure user_ids is an array
            'task_id' => 'required|exists:tasks,id', // Ensure task_id is valid
        ]);

        // Get the selected user IDs from the form
        $selectedUserIds = $request->input('user_ids');

        // Update the user_status for the selected users in the ticket table
        Ticket::whereIn('user', $selectedUserIds)
            ->where('task_number', $request->input('task_id'))
            ->update(['user_status' => 0]); // Set user_status to 0

        // Redirect back with a success message
        return redirect()->route('task')->with('message', 'Users unassigned successfully.');
    }
    public function editticket($id)
    {
        // Find the ticket details by ID
        $ticket = Ticket::find($id);

        // Check if the ticket exists
        if (!$ticket) {
            return redirect()->back()->with('error', 'Ticket not found.');
        }

        // Retrieve ticket details along with corresponding task name and number using a join query
        $ticketWithTask = Ticket::where('tickets.id', $id)
            ->join('tasks', 'tickets.task_number', '=', 'tasks.id')
            ->select('tickets.*', 'tasks.name', 'tasks.number')
            ->first();

        // Pass the ticket details and task details to the editticket view
        return view('editticket', ['ticket' => $ticketWithTask]);
    }
    public function updateticket(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'ticket_id' => 'required|integer',
            'description' => 'required|string',
        ]);

        // Retrieve the ID and description from the request
        $id = $request->input('ticket_id');
        $description = $request->input('description');

        // Find the ticket by ID
        $ticket = Ticket::find($id);

        // Check if the ticket exists
        if (!$ticket) {
            return redirect()->back()->with('error', 'Ticket not found.');
        }

        // Update the description of the ticket
        $ticket->description = $description;
        $ticket->save();

        // Redirect back with a success message
        return redirect()->route('ticket')->with('message', 'Ticket description updated successfully.');
    }
    public function startticket($id)
    {
        // Find the ticket by ID
        $ticket = Ticket::find($id);

        // Check if the ticket exists
        if (!$ticket) {
            return redirect()->back()->with('error', 'Ticket not found.');
        }

        // Check if the ticket status is already "started"
        if ($ticket->status === 'started') {
            return redirect()->back()->with('error', 'Ticket status is already started.');
        }

        // Update the ticket status to "started"
        $ticket->status = 'started';
        $ticket->save();

        // Redirect back with a success message
        return redirect()->back()->with('message', 'Ticket status updated to started.');
    }
    public function submit($id)
    {
        // Retrieve the ticket details with task name and number using join
        $ticketDetails = Ticket::where('tickets.id', $id)
            ->join('tasks', 'tickets.task_number', '=', 'tasks.id')
            ->select('tickets.*', 'tasks.name', 'tasks.number')
            ->first();


        // Check if the ticket exists
        if (!$ticketDetails) {
            return redirect()->back()->with('error', 'Ticket not found.');
        }

        // Check if the ticket status is "started"
        if ($ticketDetails->status == 'Assigned') {
            return redirect()->back()->with('error', 'Ticket status must be "started" to submit.');
        }
        if ($ticketDetails->status == 'Submitted') {
            return redirect()->back()->with('error', 'Ticket Already submitted');
        }
        if ($ticketDetails->status == 'Completed') {
            return redirect()->back()->with('error', 'Ticket Already Completed');
        }

        // If the ticket status is "started", render the submit view with ticket details
        return view('submit', ['ticket' => $ticketDetails]);
    }
    public function submitticket(Request $request)
    {
        // Retrieve the ticket ID from the request
        $ticketId = $request->input('ticket_id');

        // Retrieve the note from the request
        $note = $request->input('description');
        $link = $request->input('link');

        // Update the ticket with the submitted note
        Ticket::where('id', $ticketId)->update([
            'submit_note' => $note,
            'link' => $link,
            'status' => 'Submitted'
        ]);

        // Optionally, you can return a response or redirect the user
        return redirect()->route('ticket')->with('message', 'Note submitted successfully.');
    }
    public function ticketsubmission()
    {
        $tickets = Ticket::select('tickets.status', 'tickets.user', 'tickets.id', 'tickets.description', 'staffs.name', 'staffs.lname', 'tasks.name as task_name', 'tasks.number', 'tasks.size', 'tasks.file_path', 'categories.cat_name')
            ->join('staffs', 'tickets.user', '=', 'staffs.id')
            ->join('tasks', 'tickets.task_number', '=', 'tasks.id')
            ->join('categories', 'tasks.category_id', '=', 'categories.id')
            ->orderBy('tickets.id')
            ->get();
        return view('subticket')->with('ticket', $tickets);

    }
    public function submitviewTicket($id)
    {
        $tickets = Ticket::select('tickets.status', 'tickets.id', 'tickets.description', 'tickets.submit_note', 'tickets.link', 'tickets.remark', 'staffs.name', 'staffs.lname', 'tasks.name as task_name', 'tasks.number', 'tasks.size', 'tasks.file_path', 'categories.cat_name')
            ->join('staffs', 'tickets.user', '=', 'staffs.id')
            ->join('tasks', 'tickets.task_number', '=', 'tasks.id')
            ->join('categories', 'tasks.category_id', '=', 'categories.id')
            ->where('tickets.id', $id) // Filter by ticket ID
            ->orderBy('tickets.id')
            ->get();

        return view('submitviewTicket')->with('ticket', $tickets);
    }
    public function completeticket($id)
    {
        // Retrieve the ticket by ID
        $ticket = Ticket::find($id);

        // Check if the ticket exists
        if (!$ticket) {
            return redirect()->route('ticket')->with('error', 'Ticket not found.');
        }

        // Check if the ticket status is Submitted or Resubmitted
        if ($ticket->status == 'Submitted' || $ticket->status == 'Resubmitted') {
            // Update the ticket status to Completed
            $ticket->status = 'Completed';
            $ticket->save();

            return redirect()->route('ticket')->with('message', 'Ticket marked as completed.');
        } else {
            return redirect()->route('ticket')->with('error', 'Ticket status must be Submitted or Resubmitted to mark as completed.');
        }
    }
    public function remarkticket($id)
    {
        $ticketDetails = Ticket::where('tickets.id', $id)
            ->join('tasks', 'tickets.task_number', '=', 'tasks.id')
            ->select('tickets.*', 'tasks.name', 'tasks.number')
            ->first();


        // Check if the ticket exists
        if (!$ticketDetails) {
            return redirect()->back()->with('error', 'Ticket not found.');
        }

        // Check if the ticket status is "started"

        if ($ticketDetails->status == 'Remarked') {
            return redirect()->back()->with('error', 'Ticket Already Remarked');
        }

        // If the ticket status is "started", render the submit view with ticket details
        return view('remark', ['ticket' => $ticketDetails]);

    }
    public function addremark(Request $request)
    {
        // Validate incoming request data if needed

        // Retrieve ticket ID and remark from the form
        $ticketId = $request->input('ticket_id');
        $remark = $request->input('remark');

        // Update the ticket with the provided ticket ID
        $ticket = Ticket::find($ticketId);

        // Check if the ticket exists
        if (!$ticket) {
            return redirect()->route('ticket')->with('error', 'Ticket not found.');
        }

        // Update ticket status to "Remarked" and add the remark
        $ticket->status = 'Remarked';
        $ticket->remark = $remark;
        $ticket->save();

        // Optionally, redirect back with a success message
        return redirect()->route('ticket')->with('message', 'Remark added successfully.');
    }
    public function taskticket($id)
    {
        $tickets = Ticket::select('tickets.status', 'tickets.user', 'tickets.id', 'tickets.description', 'staffs.name', 'staffs.lname', 'tasks.name as task_name', 'tasks.number', 'tasks.size', 'tasks.file_path', 'categories.cat_name')
            ->join('staffs', 'tickets.user', '=', 'staffs.id')
            ->join('tasks', 'tickets.task_number', '=', 'tasks.id')
            ->join('categories', 'tasks.category_id', '=', 'categories.id')
            ->where('tickets.task_number', $id) // Add where clause here
            ->orderBy('tickets.id')
            ->get();

        return view('taskticket')->with(['ticket' => $tickets, 'task' => $id]);
    }
    public function completetask($id)
    {
        // Retrieve all tickets related to the task ID
        $tickets = Ticket::where('task_number', $id)->get();

        // Check if all tickets have a status of "Completed"
        $allCompleted = $tickets->every(function ($ticket) {
            return $ticket->status == 'Completed';
        });

        // If all tickets are completed, update the status of the task
        if ($allCompleted) {
            Task::where('id', $id)->update(['status' => 'Completed']);
            return Redirect()->back()->with('success', 'Task completed successfully.');
        } else {
            return Redirect()->back()->with('error', 'Not all tickets are completed.');
        }
    }

}
