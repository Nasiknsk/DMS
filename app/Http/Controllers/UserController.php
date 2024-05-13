<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;

class UserController extends Controller
{
    public function index()
    {
        return view('user');
    }
    public function insert(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $nic = $request->input('nic');
        $type = $request->input('type');
        $password = $request->input('password');
        $lname = $request->input('lname');
        $phone2 = $request->input('phone2');
        $address1 = $request->input('address');
        $address2 = $request->input('address2');
        $r_name = $request->input('relative');
        $r_ship = $request->input('relationship');
        $r_phone1 = $request->input('rphone1');
        $r_phone2 = $request->input('rphone2');

        $staff = new Staff;

        // Set the attributes
        $staff->name = $name;
        $staff->email = $email;
        $staff->phone = $phone;
        $staff->nic = $nic;
        $staff->type = $type;
        $staff->password = $password;
        $staff->lname = $lname;
        $staff->phone2 = $phone2;
        $staff->address1 = $address1;
        $staff->address2 = $address2;
        $staff->r_name = $r_name;
        $staff->r_ship = $r_ship;
        $staff->r_phone1 = $r_phone1;
        $staff->r_phone2 = $r_phone2;

        // Save the staff member to the database
        $staff->save();

        // Optionally, you can redirect or do something else after the insertion
        return redirect()->route('viewuser')->with('message', 'New user added successfully');

    }
    public function showUser()
    {
        $users = new Staff;
        $users = Staff::where('status', '=', 1)->get(); // Fetch all users from the database

        // Pass data to the view
        return view('userview', ['users' => $users]);
    }
    public function ViewFull($id)
    {
        $users = new Staff;
        $users = Staff::find($id);
        return view('viewfull', ['users' => $users]);
    }
    public function updateUser($id)
    {
        $users = new Staff;
        $users = Staff::find($id);
        return view('updateuser', ['users' => $users]);
    }
    public function deleteUser($id)
    {
        $users = new Staff;
        $users = Staff::find($id);

        $users->status = 0;
        $users->save();
        return redirect()->route('addnew')->with('message', 'User deleted successfully');
    }
    public function updateStaff(Request $request)
    {
        $users = new Staff;
        $users = Staff::find($request->input('id'));

        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->phone = $request->input('phone');
        $users->nic = $request->input('nic');
        $users->type = $request->input('type');
        $users->lname = $request->input('lname');
        $users->phone2 = $request->input('phone2');
        $users->address1 = $request->input('address');
        $users->address2 = $request->input('address2');
        $users->r_name = $request->input('relative');
        $users->r_ship = $request->input('relationship');
        $users->r_phone1 = $request->input('rphone1');
        $users->r_phone2 = $request->input('rphone2');

        $users->save();

        return redirect()->route('viewuser')->with('message', 'User updated successfully');


        //return dd($request->all());

    }
    public function dailyworks()
    {
        // Retrieve all staff details in descending order by type
        $staffDetails = Staff::orderBy('type', 'desc')->get();

        // Pass the staff details to the dailyworks view
        return view('dailyworks', ['staffDetails' => $staffDetails]);
    }
}
