<?php

namespace App\Http\Controllers\Admin;

use App\OurTeam;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class OurTeamController extends Controller
{
    public function index(){
        $ourTeams =OurTeam::latest()->paginate(10);
        return view('admin.ourTeam',compact('ourTeams'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'designation'=>'required',
            'avatar'=>'required|mimes:jpg,png,jpeg|max:1024',
        ]);

        if($request->hasFile('avatar')){
            $file =$request->file('avatar');
            $text =$file->getClientOriginalExtension();
            $fileName =time().'.'.$text;
            $file->move('uploads/avatar',$fileName);

            OurTeam::create([
                'name'=>request('name'),
                'designation'=>request('designation'),
                'avatar'=>$fileName,
            ]);

            return redirect()->back()->with('message','Team Added Successfully');
        }

    }



    public function update(Request $request,$id){
        $this->validate($request,[
            'name'=>'required',
            'designation'=>'required',
            'avatar'=>'mimes:jpg,png,jpeg|max:1024',
        ]);



        if($request->hasFile('avatar')){
            \File::delete(public_path('uploads/avatar/').$request->hide_avatar);
            $file =$request->file('avatar');
            $text =$file->getClientOriginalExtension();
            $fileName =time().'.'.$text;
            $file->move('uploads/avatar',$fileName);

            OurTeam::whereId($id)->update([
                'name'=>request('name'),
                'designation'=>request('designation'),
                'avatar'=>$fileName,
            ]);

            return redirect()->back()->with('message','Team Updated Successfully');
        }
        else{
            OurTeam::whereId($id)->update([
                'name'=>request('name'),
                'designation'=>request('designation'),

            ]);

            return redirect()->back()->with('message','Team Updated Successfully');
        }


    }


    public function destroy($id){
        $team =OurTeam::whereId($id)->get()->first();
        \File::delete(public_path('uploads/avatar/').$team->avatar);

        $ourTeam =OurTeam::findOrFail($id);
        $ourTeam->delete();


        return redirect()->back()->with('message1','Team Deleted Successfully');


    }

}
