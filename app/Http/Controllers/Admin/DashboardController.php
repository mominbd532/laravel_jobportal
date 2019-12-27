<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function registered(){
        $admins =User::where('user_type','admin')->paginate(10);
        $seekers =User::where('user_type','seeker')->paginate(10);
        $employers =User::where('user_type','employer')->paginate(10);
        $blocks =User::where('user_type','block')->paginate(10);
        return view('admin.register',compact('admins','seekers','employers','blocks'));
    }



    public function update(Request $request,$id){
        User::where('id',$id)->update([
            'user_type'=>request('user_type'),
        ]);

        return redirect()->to('/registered-role')->with('message','Register Role Updated Successfully');
    }

    public function delete($id){
        $user =User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('message1','User deleted successfully');

    }
}
