<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Work;
use Carbon\Carbon;

class WorkController extends Controller
{
    public function dailyupdates($id)
    {
        // Retrieve the work entry for today's date and the specified user ID
        $todaysWork = Work::whereDate('created_at', Carbon::today())
            ->where('user', $id)
            ->first();

        // Pass the description to the dailyupdates view
        return view('dailyupdates', ['description' => $todaysWork ? $todaysWork->description : null]);
    }

    public function submitwork(Request $request)
    {
        // Check if an entry already exists for today's date
        $existingWork = Work::whereDate('created_at', Carbon::today())
            ->where('user', $request->input('staff'))
            ->first();

        // If an entry exists for today's date, return an error message
        if ($existingWork) {
            return redirect()->back()->with('error', 'You have already submitted work for today.');
        }

        // Create a new Work instance
        $work = new Work();

        // Set work details from the form data
        $work->description = $request->input('description');
        $work->user = $request->input('staff');
        // Add more fields as needed

        // Save the work to the database
        $work->save();

        // Optionally, redirect back with a success message
        return redirect()->back()->with('message', 'Work submitted successfully.');
    }
    public function updatework(Request $request)
    {
        // Retrieve the work entry for today's date
        $todaysWork = Work::whereDate('created_at', Carbon::today())->first();

        // If no work entry exists for today, return an error message
        if (!$todaysWork) {
            return redirect()->back()->with('error', 'No work entry found for today.');
        }

        // Update the description of today's work
        $todaysWork->description = $request->input('edited-description');
        $todaysWork->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Work updated successfully.');
    }
    public function viewworks($id)
    {
        // Retrieve all details from the works table for the given user ID
        $worksDetails = Work::where('user', $id)
            ->leftJoin('staffs', 'works.user', '=', 'staffs.id')
            ->select('works.*', 'staffs.name', 'staffs.lname')
            ->get();

        // Pass the works details to the view
        return view('viewworks', ['worksDetails' => $worksDetails]);
    }
    public function viewownwork($id)
    {
        $worksDetails = Work::where('user', $id)
            ->leftJoin('staffs', 'works.user', '=', 'staffs.id')
            ->select('works.*', 'staffs.name', 'staffs.lname')
            ->get();

        // Pass the works details to the view
        return view('viewownwork', ['worksDetails' => $worksDetails]);
    }

}
