<?php

namespace App\Http\Controllers;

use App\AboutUs;
use App\OurTeam;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index(){
        $aboutUs =AboutUs::all()->first();
        $ourTeams =OurTeam::all();
        return view('about.show',compact('aboutUs','ourTeams'));
    }
}
