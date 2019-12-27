@extends('layouts.master')


@section('title')

    Blog | Job Finder

@endsection


@section('content')
    @if(Session::has('message'))
        <div class="alert alert-success">
            {{Session::get('message')}}
        </div>

    @endif
    @if(Session::has('message1'))
        <div class="alert alert-danger">
            {{Session::get('message1')}}
        </div>

    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="card-title">Blogs Table

                            </h4>
                        </div>
                        <div class="col-md-6">
                            <!-- Button trigger modal -->
                            <button  type="button"  class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
                                Add Team
                            </button>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <th>
                                Title
                            </th>
                            <th>
                                Author Name
                            </th>
                            <th>
                                Details
                            </th>
                            <th >
                                Avatar
                            </th>
                            <th>
                                Edit
                            </th>
                            <th class="text-right">
                                Delete
                            </th>
                            </thead>
                            <tbody>
                            @foreach($blogs as $blog)
                            <tr>
                                <td>
                                    {{$blog->title}}
                                </td>
                                <td>
                                    {{$blog->author_name}}
                                </td>
                                <td>
                                    {{$blog->details}}
                                </td>
                                <td>
                                    @if(empty($blog->blog_photo))
                                        <img  src="{{asset('avatar/logo.png')}}" width="100">

                                    @else
                                        <img
                                                src="{{asset('uploads/blog_photo')}}/{{$blog->blog_photo}}"
                                                width="100" height="100">
                                    @endif
                                </td>
                                <td>
                                    <!-- Button trigger modal -->
                                    <button  type="button"  class="btn btn-info float-right" data-toggle="modal" data-target="#exampleModal{{$blog->id}}">
                                        Edit
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{$blog->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Blog</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <form action="{{route('blog.update',[$blog->id])}}" method="post" enctype="multipart/form-data" id="sample_form">
                                                    @csrf
                                                    <input type="hidden" name="hide_photo" value="{{$blog->blog_photo}}">

                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label>Title:</label>
                                                            <input type="text"  class="form-control" value="{{$blog->title}}" name="title">

                                                        </div>
                                                        {{--Error Exception--}}
                                                        @if($errors->has('title'))
                                                            <div class="error" style="color: red">
                                                                {{$errors->first('title')}}
                                                            </div>

                                                        @endif


                                                        <div class="form-group">
                                                            <label>Author Name:</label>
                                                            <input type="text" class="form-control"  value="{{$blog->author_name}}" name="author_name">
                                                        </div>
                                                        {{--Error Exception--}}
                                                        @if($errors->has('author_name'))
                                                            <div class="error" style="color: red">
                                                                {{$errors->first('author_name')}}
                                                            </div>

                                                        @endif

                                                        <div class="form-group">
                                                            <label>Blog Details:</label>
                                                            <textarea class="form-control" name="details"> {{$blog->details}}</textarea>
                                                        </div>
                                                        {{--Error Exception--}}
                                                        @if($errors->has('details'))
                                                            <div class="error" style="color: red">
                                                                {{$errors->first('details')}}
                                                            </div>

                                                        @endif


                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" name="blog_photo" id="blog_photo"><br>
                                                            <label class="custom-file-label" for="blog_photo">Upload Photo</label>
                                                        </div>


                                                    </div>


                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>&nbsp;
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </div>
                                                </form>


                                            </div>
                                        </div>
                                    </div>


                                </td>
                                <td class="text-right">
                                    <a href="{{route('blog.destroy',[$blog->id])}}" class="btn btn-danger">Delete</a>

                                </td>
                            </tr>
                                @endforeach

                            </tbody>
                            {{$blogs->links()}}
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Blog</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{route('blog.create')}}" method="post" enctype="multipart/form-data" id="sample_form">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Title:</label>
                            <input type="text"  class="form-control" placeholder="Enter title" name="title">

                        </div>
                        {{--Error Exception--}}
                        @if($errors->has('title'))
                            <div class="error" style="color: red">
                                {{$errors->first('title')}}
                            </div>

                        @endif

                        <div class="form-group">
                            <label>Author Name:</label>
                            <input type="text" class="form-control"  placeholder="Enter Author Name" name="author_name">
                        </div>
                        {{--Error Exception--}}
                        @if($errors->has('author_name'))
                            <div class="error" style="color: red">
                                {{$errors->first('author_name')}}
                            </div>

                        @endif

                        <div class="form-group">
                            <label>Blog Details:</label>
                            <textarea class="form-control" name="details" placeholder="Enter Your Blog Details"></textarea>
                        </div>
                        {{--Error Exception--}}
                        @if($errors->has('details'))
                            <div class="error" style="color: red">
                                {{$errors->first('details')}}
                            </div>

                        @endif


                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="blog_photo" id="blog_photo"><br>
                            <label class="custom-file-label" for="blog_photo">Upload Photo</label>
                        </div>

                        {{--Error Exception--}}
                        @if($errors->has('blog_photo'))
                            <div class="error" style="color: red">
                                {{$errors->first('blog_photo')}}
                            </div>

                        @endif




                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>


            </div>
        </div>
    </div>



@endsection



@section('script')



@endsection