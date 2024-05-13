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


        return redirect()-> route('contacts')->with('message', 'Contact added successfully.');

    }
    public function ViewContact()
    {
        $contact=new Contact();
        $contact = Contact::all();
        return view('contacts',['contact'=>$contact]);
    }
    public function editContact($id)
    {

        $con = Contact::find($id);
        return view('editContact', ['editContact' => $con]);
    }
    public function updatecontact(Request $request)
    {
        //$name = $request->input('name');
        $id = $request->input('id');



        // Category name is unique, proceed with the update
        $contact = Contact::find($id);

        if (!$contact) {
            // Handle the case where the category with the given ID is not found
            return redirect()->route('addcat')->with('message', 'Contact not found.');
        }

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

        return redirect()-> route('contacts')->with('message', 'Contact updated successfully.');
    }
    public function deleteContact($id)
    {
        try {
            // Find the category by ID
            $con = Contact::find($id);

            // Check if the category exists
            if ($con) {
                // Delete the category
                $con->delete();

                return redirect()->route('contacts')->with('message', 'Contact Details deleted successfully');
            } else {
                return redirect()->route('contacts')->with('error', 'This Contact has data
                ');
            }
        } catch (\Exception $e) {
            // Handle exceptions, log them, or return an error message
            return redirect()->route('contacts')->with('error', 'This Contact has data');
        }
    }
}
