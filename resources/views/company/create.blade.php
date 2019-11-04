@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @if(empty(Auth::user()->company->logo))
                    <img style="width: 100%" src="{{asset('avatar/logo.png')}}" width="100">

                @else
                    <img style="width: 100%"
                         src="{{asset('uploads/logo')}}/{{Auth::user()->company->logo}}"
                         width="100" height="200">
                @endif

                <form action="{{route('company.logo')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">Upload Company Logo</div>
                        <div class="card-body">
                            <input type="file" name="logo" class="form-control"><br>
                            <button class="btn btn-primary" type="submit"> Upload</button>
                        </div>
                        {{--Error Exception--}}
                        @if($errors->has('logo'))
                            <div class="error" style="color: red">
                                {{$errors->first('logo')}}
                            </div>

                        @endif
                    </div>
                </form>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        Update Company Information
                    </div>
                    <div class="card-body">
                        <form action="{{route('company.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Address</label>
                                <textarea class="form-control" rows="3" name="address">{{Auth::user()->company->address}}

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
                                <input value="{{Auth::user()->company->phone}}" type="text" name="phone" class="form-control">
                            </div>
                            {{--Error Exception--}}
                            @if($errors->has('phone'))
                                <div class="error" style="color: red">
                                    {{$errors->first('phone')}}
                                </div>

                            @endif
                            <div class="form-group">
                                <label for="">Website</label>
                                <input value="{{Auth::user()->company->website}}" type="text" name="website" class="form-control">
                            </div>
                            {{--Error Exception--}}
                            @if($errors->has('website'))
                                <div class="error" style="color: red">
                                    {{$errors->first('website')}}
                                </div>

                            @endif
                            <div class="form-group">
                                <label for="">Slogan</label>
                                <input value="{{Auth::user()->company->slogan}}" type="text" name="slogan" class="form-control">
                            </div>
                            {{--Error Exception--}}
                            @if($errors->has('slogan'))
                                <div class="error" style="color: red">
                                    {{$errors->first('slogan')}}
                                </div>

                            @endif
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea class="form-control" rows="3" name="description">{{Auth::user()->company->description}}

                                </textarea>
                            </div>
                            {{--Error Exception--}}
                            @if($errors->has('description'))
                                <div class="error" style="color: red">
                                    {{$errors->first('description')}}
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
                        <p><b>Company Name:</b>{{Auth::user()->company->cname}} </p>
                        <p><b>Email:</b> {{Auth::user()->email}}</p>
                        <p><b>Address:</b> {{Auth::user()->company->address}} </p>
                        <p><b>Phone Number:</b> {{Auth::user()->company->phone}} </p>
                        <p><b>Website:</b> {{Auth::user()->company->website}}</p>
                        <p><b>Go to:</b> <a href="company/{{Auth::user()->company->slug}}">Company Page</a></p>
                        <p><b>Slogan:</b>  {{Auth::user()->company->slogan}}</p>
                        <p><b>Description:</b> {{Auth::user()->company->description}} </p>
                        <p><b>Member Since:</b>  {{Auth::user()->created_at->diffForHumans()}}</p>

                    </div>
                </div>
                <form action="{{route('company.cover_photo')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">Upload Company Cover Photo</div>
                        <div class="card-body">
                            <input type="file" name="cover_photo" class="form-control"><br>
                            <button class="btn btn-primary" type="submit"> Upload</button>
                        </div>
                        {{--Error Exception--}}
                        @if($errors->has('cover_photo'))
                            <div class="error" style="color: red">
                                {{$errors->first('cover_photo')}}
                            </div>

                        @endif
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
