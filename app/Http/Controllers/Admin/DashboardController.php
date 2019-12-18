<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function registered(){
        $users =User::paginate(10);
        return view('admin.register',compact('users'));
    }

    public function edit($id){
        $user= User::findOrFail($id);
        return view('admin.register-edit',compact('user'));
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
