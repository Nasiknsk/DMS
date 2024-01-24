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

        $staff = new Staff;

        // Set the attributes
        $staff->name = $name;
        $staff->email = $email;
        $staff->phone = $phone;
        $staff->nic = $nic;
        $staff->type = $type;
        $staff->password = $password; // Note: You should hash the password before saving it

        // Save the staff member to the database
        $staff->save();

        // Optionally, you can redirect or do something else after the insertion
        return redirect()->route('addnew')->with('message', 'New user added successfully');

    }
    public function showUser()
    {
        $users = new Staff;
        $users = Staff::where('status','=',1)->get(); // Fetch all users from the database

        // Pass data to the view
        return view('userview', ['users' => $users]);
    }
    public function updateUser($id)
    {
       $users=new Staff;
       $users=Staff::find($id);
       return view ('updateuser',['users'=>$users]);
    }
    public function deleteUser($id)
    {
        $users=new Staff;
        $users=Staff::find($id);

        $users->status=0;
        $users->save();
        return redirect()->route('addnew')->with('message', 'User deleted successfully');
    }
    public function updateStaff(Request $request)
    {
        $users=new Staff;
        $users=Staff::find($request->input('id'));

        $users->name=$request->input('name');
        $users->email=$request->input('email');
        $users->phone=$request->input('phone');
        $users->nic=$request->input('nic');
        $users->type=$request->input('type');

        $users->save();

        return redirect()->route('addnew')->with('message', 'User updated successfully');

    }
}
