<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;

class LoginController extends Controller
{
    public function check(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        // Query the database to check if the user exists
        $user = Staff::where('email', $email)->where('password', $password)->first();

        if ($user) {
            switch ($user->type) {
                case 0:
                    $request->session()->put('user', [
                        'id' => $user->id,
                        'name' => $user->name,
                        'type'=>$user->type,
                        // Add other details as needed
                    ]);
                    return view('userdash')->with(['userName'=> $user->name ,'id'=>$user->id,'type'=>$user->type]);
                case 1:
                    $request->session()->put('user', [
                        'id' => $user->id,
                        'name' => $user->name,
                        'type'=>$user->type,
                        // Add other details as needed
                    ]);
                    return view('superdash')->with(['userName'=> $user->name ,'id'=>$user->id,'type'=>$user->type]);
                case 2:
                    $request->session()->put('user', [
                        'id' => $user->id,
                        'name' => $user->name,
                        'type'=>$user->type,
                        // Add other details as needed
                    ]);
                    return view('admindash')->with(['userName'=> $user->name ,'id'=>$user->id,'type'=>$user->type]);
                default:
                    return "Unknown User Type";
            }
        } else {
            return "User not found. Check your credentials.";
        }
    }
}
