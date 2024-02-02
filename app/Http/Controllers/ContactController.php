<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function addContact(Request $request)
    {
        $contact=new Contact();
        $contact->office_name=$request->input('office');
        $contact->department=$request->input('department');
        $contact->section=$request->input('section');
        $contact->address=$request->input('address');
        $contact->office_mail=$request->input('omail');
        $contact->office_phone=$request->input('ophone');
        $contact->incharge=$request->input('person');
        $contact->phone1=$request->input('phone1');
        $contact->phone2=$request->input('phone2');
        $contact->email=$request->input('email');

        $contact->save();


        return view('contacts')->with('message', 'Contact added successfully.');

    }
    public function ViewContact()
    {
        $contact=new Contact();
        $contact = Contact::all();
        return view('contacts',['contact'=>$contact]);
    }
}
