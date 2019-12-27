<?php

namespace App\Http\Controllers\Admin;

use App\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function index(){
        $blogs =Blog::latest()->paginate();
        return view('admin.blog',compact('blogs'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'title'=>'required',
            'author_name'=>'required',
            'details'=>'required',
            'blog_photo'=>'required|mimes:jpg,png,jpeg|max:1024',
        ]);

        if($request->hasFile('blog_photo')){
            $file =$request->file('blog_photo');
            $text =$file->getClientOriginalExtension();
            $fileName =time().'.'.$text;
            $file->move('uploads/blog_photo',$fileName);

            Blog::create([
                'title'=>request('title'),
                'author_name'=>request('author_name'),
                'details'=>request('details'),
                'blog_photo'=>$fileName,
            ]);

            return redirect()->back()->with('message','Team Added Successfully');
        }
    }

    public function update(Request $request,$id){
        $this->validate($request,[
            'title'=>'required',
            'author_name'=>'required',
            'details'=>'required',
            'blog_photo'=>'mimes:jpg,png,jpeg|max:1024',
        ]);



        if($request->hasFile('blog_photo')){
            \File::delete(public_path('uploads/blog_photo/').$request->hide_photo);
            $file =$request->file('blog_photo');
            $text =$file->getClientOriginalExtension();
            $fileName =time().'.'.$text;
            $file->move('uploads/blog_photo',$fileName);

            Blog::whereId($id)->update([
                'title'=>request('title'),
                'author_name'=>request('author_name'),
                'details'=>request('details'),
                'blog_photo'=>$fileName,
            ]);

            return redirect()->back()->with('message','Blog Updated Successfully');
        }
        else{
            Blog::whereId($id)->update([
                'title'=>request('title'),
                'author_name'=>request('author_name'),
                'details'=>request('details'),

            ]);

            return redirect()->back()->with('message','Blog Updated Successfully');
        }


    }


    public function destroy($id){
        $blog =Blog::whereId($id)->get()->first();
        \File::delete(public_path('uploads/blog_photo/').$blog->blog_photo );

        $ourTeam =Blog::findOrFail($id);
        $ourTeam->delete();


        return redirect()->back()->with('message1','Team Deleted Successfully');


    }

}
