<?php

namespace App\Http\Controllers\Admin;

use App\AboutUs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutUsController extends Controller
{
    public function edit(){
        $aboutUs =AboutUs::all()->first();

        return view('admin.aboutUs-edit',compact('aboutUs'));

    }

    public function update(Request $request,$id){

        $this->validate($request,[
            'description' =>'required',
            'name' =>'required',
            'designation' =>'required',
        ]);

        AboutUs::where('id',$id)->update([
            'description' =>request('description'),
            'name' =>request('name'),
            'designation' =>request('designation'),

        ]);

        return redirect()->back()->with('message','About Us Updated Successfully');


    }
}
