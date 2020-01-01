@extends('layouts.master')


@section('title')

    Contact Info Edit | Job Finder

@endsection

@section('navbar')
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
            <div class="navbar-wrapper">
                <div class="navbar-toggle">
                    <button type="button" class="navbar-toggler">
                        <span class="navbar-toggler-bar bar1"></span>
                        <span class="navbar-toggler-bar bar2"></span>
                        <span class="navbar-toggler-bar bar3"></span>
                    </button>
                </div>
                <a class="navbar-brand" href="#pablo">Edit About Us</a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar navbar-kebab"></span>
                <span class="navbar-toggler-bar navbar-kebab"></span>
                <span class="navbar-toggler-bar navbar-kebab"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navigation">
                <form>
                    <div class="input-group no-border">
                        <input type="text" value="" class="form-control" placeholder="Search...">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="now-ui-icons ui-1_zoom-bold"></i>
                            </div>
                        </div>
                    </div>
                </form>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#pablo">
                            <i class="now-ui-icons media-2_sound-wave"></i>
                            <p>
                                <span class="d-lg-none d-md-block">Stats</span>
                            </p>
                        </a>
                    </li>


                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Admin
                            <p>
                                <span class="d-lg-none d-md-block">Some Actions</span>
                            </p>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>

                    {{--
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="now-ui-icons location_world"></i>
                            <p>
                                <span class="d-lg-none d-md-block">Some Actions</span>
                            </p>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>

                    --}}
                    <li class="nav-item">
                        <a class="nav-link" href="#pablo">
                            <i class="now-ui-icons users_single-02"></i>
                            <p>
                                <span class="d-lg-none d-md-block">Account</span>
                            </p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="panel-header panel-header-sm"></div>


@endsection



@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit About Us</h4>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6">
                            @if(Session::has('message'))
                                <div class="alert alert-success">
                                    {{Session::get('message')}}
                                </div>

                            @endif


                            <form action="{{route('aboutUs.update',[$aboutUs->id])}}" method="post">

                                @csrf

                                <div class="form-group">
                                    <label >Description:</label><br>
                                    <textarea class="form-control" name="description">{{$aboutUs->description}}
                                    </textarea>

                                </div>

                                {{--Error Exception--}}
                                @if($errors->has('description'))
                                    <div class="error" style="color: red">
                                        {{$errors->first('description')}}
                                    </div>

                                @endif

                                <div class="form-group">
                                    <label >Name:</label><br>
                                    <input type="text" class="form-control" value="{{$aboutUs->name}}" name="name" >

                                </div>

                                {{--Error Exception--}}
                                @if($errors->has('name'))
                                    <div class="error" style="color: red">
                                        {{$errors->first('name')}}
                                    </div>

                                @endif

                                <div class="form-group">
                                    <label >Designation:</label><br>
                                    <input type="text" class="form-control" value="{{$aboutUs->designation}}" name="designation">

                                </div>

                                {{--Error Exception--}}
                                @if($errors->has('designation'))
                                    <div class="error" style="color: red">
                                        {{$errors->first('designation')}}
                                    </div>

                                @endif

                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="/admin" class="btn btn-danger">Cancel</a>
                            </form>

                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>



@endsection



@section('script')



@endsection