@extends('layouts.main')

@section('content')
    <br>
    <div class="site-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @if(empty(Auth::user()->profile->avatar))
                    <img style="width: 100%" src="{{asset('avatar/logo.png')}}" width="100">

                    @else
                    <img style="width: 100%"
                         src="{{asset('uploads/avatar')}}/{{Auth::user()->profile->avatar}}"
                         width="100" height="200">
                    @endif

                <form action="{{route('profile.avatar')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">Upload Your Photo</div>
                        <div class="card-body">
                            <input type="file" name="avatar" class="form-control"><br>
                            <button class="btn btn-primary" type="submit"> Upload</button>
                        </div>
                        {{--Error Exception--}}
                        @if($errors->has('avatar'))
                            <div class="error" style="color: red">
                                {{$errors->first('avatar')}}
                            </div>

                        @endif
                    </div>
                </form>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        Update Your Information
                    </div>
                    <div class="card-body">
                        <form action="{{route('profile.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Address</label>
                                <textarea class="form-control" rows="3" name="address">{{Auth::user()->profile->address}}
                            </textarea>
                        </div>
                            {{--Error Exception--}}
                            @if($errors->has('address'))
                                <div class="error" style="color: red">
                                    {{$errors->first('address')}}
                                </div>

                                @endif
                            <div class="form-group">
                                <label for="">Phone Number</label>
                                <input value="{{Auth::user()->profile->phone_number}}" type="text" name="phone_number" class="form-control">
                            </div>
                            {{--Error Exception--}}
                            @if($errors->has('phone_number'))
                                <div class="error" style="color: red">
                                    {{$errors->first('phone_number')}}
                                </div>

                            @endif
                    <div class="form-group">
                        <label for="">Experience</label>
                        <textarea class="form-control" rows="3" name="experience">{{Auth::user()->profile->experience}}
                    </textarea>
                </div>
                            {{--Error Exception--}}
                            @if($errors->has('experience'))
                                <div class="error" style="color: red">
                                    {{$errors->first('experience')}}
                                </div>

                            @endif
                <div class="form-group">
                    <label for="">Bio Data</label>
                    <textarea class="form-control" rows="3" name="bio">{{Auth::user()->profile->bio}}
                </textarea>
            </div>
                            {{--Error Exception--}}
                            @if($errors->has('bio'))
                                <div class="error" style="color: red">
                                    {{$errors->first('bio')}}
                                </div>

                            @endif
            <div class="form-group">
                <button class="btn btn-dark" type="submit">Save</button>
            </div>
                @if(Session::has('massage'))
                    <div class="alert alert-success">
                        {{Session::get('massage')}}
                                </div>

                                @endif
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">User Details</div>
                    <div class="card-body">
                        <p><b>Name:</b>  {{Auth::user()->name}}</p>
                        <p><b>Email:</b>  {{Auth::user()->email}}</p>
                        <p><b>Address:</b>  {{Auth::user()->profile->address}}</p>
                        <p><b>Phone Number:</b>  {{Auth::user()->profile->phone_number}}</p>
                        <p><b>Experience:</b>  {{Auth::user()->profile->experience}}</p>
                        <p><b>Bio Date:</b>  {{Auth::user()->profile->bio}}</p>
                        <p><b>Member Since:</b>  {{Auth::user()->created_at->diffForHumans()}}</p>
                        @if(!empty(Auth::user()->profile->cover_letter))
                            <p>
                                <a href="{{Storage::url(Auth::user()->profile->cover_letter)}}">
                                Cover Letter
                                </a>
                            </p>
                            @else
                            <p>Please Upload Your Cover Letter</p>

                        @endif

                        @if(!empty(Auth::user()->profile->resume))
                            <p>
                                <a href="{{Storage::url(Auth::user()->profile->resume)}}">
                                    Resume
                                </a>
                            </p>
                        @else
                            <p>Please Upload Your Resume</p>

                        @endif
                    </div>
                </div>
                <form action="{{route('profile.coverletter')}}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="card">
                    <div class="card-header">Upload Your Cover Letter</div>
                    <div class="card-body">
                        <input type="file" name="cover_letter" class="form-control"><br>
                        <button class="btn btn-primary" type="submit"> Upload</button>
                    </div>
                    {{--Error Exception--}}
                    @if($errors->has('cover_letter'))
                        <div class="error" style="color: red">
                            {{$errors->first('cover_letter')}}
                        </div>

                    @endif
                </div>
                </form>
                <form action="{{route('profile.resume')}}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="card">
                    <div class="card-header">Upload Your Resume</div>
                    <div class="card-body">
                        <input type="file" name="resume" class="form-control"><br>
                        <button class="btn btn-primary" type="submit"> Upload</button>
                    </div>
                    {{--Error Exception--}}
                    @if($errors->has('resume'))
                        <div class="error" style="color: red">
                            {{$errors->first('resume')}}
                        </div>

                    @endif
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
