<?php

namespace App\Http\Controllers;

use App\Company;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployerProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function store(){


        $user = User::create([
            'name' => request('cname'),
            'email' => request('email'),
            'user_type'=> request('user_type'),
            'password' => Hash::make(request('password')),
        ]);
        Company::create(
            ['user_id'=>$user->id,
              'cname' => request('cname'),
              'slug' => str_slug(request('cname')),
        ]);
        return redirect()->back()
            ->with('massage','Email must be verified');
    }
}
