<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use App\Company;
use App\Job;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\JobPostRequest;

class JobController extends Controller
{
    public function index(){
        $jobs =Job::latest()->limit(10)->get();
        $categorys =Category::with('jobs')->get();
        $blogs =Blog::latest()->get();
        return view('welcome',compact('jobs','categorys','blogs'));
    }
    public function show($id,Job $job){
        $date=date('Y-m-d');
        return view('jobs.show',compact('job','date'));
    }

    public function create(){
        return view('jobs.create');
    }

    public function store(JobPostRequest $request){
        $user_id =Auth::user()->id;
        $company =Company::where('user_id',$user_id)->first();
        $company_id =$company->id;
        Job::create([
            'user_id'=>$user_id,
            'company_id' =>$company_id,
            'title' =>request('title'),
            'slug' =>str_slug(request('title')),
            'roles' =>request('roles'),
            'description' =>request('description'),
            'category_id' =>request('category_id'),
            'position' =>request('position'),
            'address' =>request('address'),
            'type' =>request('type'),
            'status' =>request('status'),
            'last_date' =>request('last_date'),


        ]);

        return redirect()->back()->with('massage','Your Job Posted Successfully');
    }

    public function my_jobs(){
        $jobs =Job::where('user_id',Auth::user()->id)->get();
        return view('jobs.my_jobs',compact('jobs'));
    }

    public function edit($id){
        $job = Job::findOrFail($id);
        return view('jobs.edit',compact('job'));
    }
    public function update(Request $request,$id){
        $this->validate($request,[
            'title' =>'required',
            'roles' =>'required',
            'description' =>'required',
            'position' =>'required',
            'address' =>'required',
            'status' =>'required',
            'last_date' =>'required',
        ]);

        $job =Job::findOrFail($id);
        $job->title =request('title');
        $job->roles =request('roles');
        $job->description =request('description');
        $job->category_id =request('category_id');
        $job->position =request('position');
        $job->address =request('address');
        $job->type =request('type');
        $job->status =request('status');
        $job->last_date =request('last_date');
        $job->save();
        return redirect()->to('/jobs/my_jobs');

    }

    public function destroy($id){
        $job =Job::findOrFail($id);
        $job->delete();
        return redirect()->to('/jobs/my_jobs');

    }

    public function apply(Request $request,$id){
        $jobId =Job::find($id);
        $jobId->users()->attach(Auth::user()->id);
        return redirect()->back()->with('massage','Applied Successfully');
    }

    public function applicants(){
        $applicants = Job::has('users')->where('user_id',auth()->user()->id)->get();
        return view('jobs.applicants',compact('applicants'));
    }

    public function all_jobs(Request $request){
        $keyword = request('title');
        $type = request('type');
        $category = request('category_id');
        $address = request('address');
        if ($keyword||$type||$category||$address)
        {
            $jobs =Job::where('title','LIKE','%'.$keyword.'%')
                ->orWhere('type',$type)
                ->orWhere('category_id',$category)
                ->orWhere('address',$address)->paginate(10);
            return view('jobs.all_jobs',compact('jobs'));
        }
         else{
             $jobs =Job::latest()->paginate(10);
             return view('jobs.all_jobs',compact('jobs'));
         }



    }
    public function searchJob(Request $request){
        $keyword =$request->get ('keyword');
        $users =Job::where('title','LIKE','%'.$keyword.'%')
            ->orWhere('position','LIKE','%'.$keyword.'%')
            ->limit(5)->get();
        return response()->json($users);


    }


}
