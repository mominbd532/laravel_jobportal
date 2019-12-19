<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Contactinfo;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        $contactInfo =Contactinfo::all()->first();
        return view('contact.create',compact('contactInfo'));
    }

    public function create(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'message'=>'required',
        ]);
        Contact::create([
            'name'=>request('name'),
            'email'=>request('email'),
            'phone'=>request('phone'),
            'message'=>request('message'),
            ]);

        return redirect()->back()->with('message','Thanks for your message');

    }

    public function show(){
        $contacts =Contact::latest()->paginate(10);

        return view('contact.show',compact('contacts'));


    }

    public function destroy($id){
       $contacts =Contact::findOrFail($id);
       $contacts->delete();

       return redirect()->back()->with('message','Message Deleted Successfully');
    }
}
