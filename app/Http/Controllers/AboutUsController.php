<?php

namespace App\Http\Controllers;

use App\AboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index(){
        $aboutUs =AboutUs::all()->first();
        return view('about.show',compact('aboutUs'));
    }
}
