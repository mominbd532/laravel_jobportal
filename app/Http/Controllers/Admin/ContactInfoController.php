<?php

namespace App\Http\Controllers\Admin;

use App\Contactinfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactInfoController extends Controller
{
    public function edit(){
        $contactInfo =Contactinfo::all()->first();
        return view('admin.contactInfo-edit',compact('contactInfo'));
    }

    public function update(Request $request,$id){
        $this->validate($request,[
            'addressLine1'=>'required',
            'addressLine2'=>'',
            'addressLine3'=>'',
            'serviceTime1'=>'required',
            'serviceTime2'=>'',
            'serviceTime3'=>'',
            'phone'=>'required|integer',
            'email'=>'required|email',
            'moreInfo'=>'required',
        ]);
        Contactinfo::where('id',$id)->update([
            'addressLine1'=>request('addressLine1'),
            'addressLine2'=>request('addressLine2'),
            'addressLine3'=>request('addressLine3'),
            'serviceTime1'=>request('serviceTime1'),
            'serviceTime2'=>request('serviceTime2'),
            'serviceTime3'=>request('serviceTime3'),
            'phone'=>request('phone'),
            'email'=>request('email'),
            'moreInfo'=>request('moreInfo'),
        ]);

        return redirect()->back()->with('message','Contact Information Updated Successfully');
    }
}
