@extends('layouts.master')


@section('title')

    Our Team | Job Finder

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
                <a class="navbar-brand" href="#pablo">Our Team</a>
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
                            <h4 class="card-title">Our Team

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
                                Name
                            </th>
                            <th>
                                Designation
                            </th>
                            <th>
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
                            @foreach($ourTeams as $ourTeam)
                            <tr>
                                <td>
                                    {{$ourTeam->name}}
                                </td>
                                <td>
                                    {{$ourTeam->designation}}
                                </td>
                                <td>
                                    @if(empty($ourTeam->avatar))
                                        <img  src="{{asset('avatar/logo.png')}}" width="100">

                                    @else
                                        <img
                                             src="{{asset('uploads/avatar')}}/{{$ourTeam->avatar}}"
                                             width="100" height="100">
                                    @endif
                                </td>
                                <td >
                                    <!-- Button trigger modal -->
                                    <button type="button"  class="btn btn-info" data-toggle="modal" data-target="#editModal{{$ourTeam->id}}">
                                        Edit
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="editModal{{$ourTeam->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Team</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{route('ourTeam.update',[$ourTeam->id])}}" method="post" enctype="multipart/form-data" id="sample_form">
                                                <div class="modal-body" >
                                                    @csrf
                                                    <input type="hidden" name="hide_avatar" value="{{$ourTeam->avatar}}">


                                                    <div class="form-group">
                                                        <label>Name:</label>
                                                        <input type="text"  class="form-control" value="{{$ourTeam->name}}" name="name" id="name">

                                                    </div>
                                                    {{--Error Exception--}}
                                                    @if($errors->has('name'))
                                                        <div class="error" style="color: red">
                                                            {{$errors->first('name')}}
                                                        </div>

                                                    @endif

                                                    <div class="form-group">
                                                        <label>Designation:</label>
                                                        <input type="text" class="form-control"  value="{{$ourTeam->designation}}" name="designation" id="designation">
                                                    </div>
                                                    {{--Error Exception--}}
                                                    @if($errors->has('designation'))
                                                        <div class="error" style="color: red">
                                                            {{$errors->first('designation')}}
                                                        </div>

                                                    @endif


                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="avatar" id="avatar"><br>
                                                        <label class="custom-file-label" for="avatar">Upload Photo</label>
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
                                    <a href="{{route('ourTeam.destroy',[$ourTeam->id])}}" class="btn btn-danger">Delete</a>

                                </td>
                            </tr>

                            @endforeach

                            </tbody>
                        </table>

                        {{$ourTeams->links()}}
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
                    <h5 class="modal-title" id="exampleModalLabel">Add Team</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{route('ourTeam.create')}}" method="post" enctype="multipart/form-data" id="sample_form">
                @csrf
                    <div class="modal-body">
                    <div class="form-group">
                        <label>Name:</label>
                        <input type="text"  class="form-control" placeholder="Enter name" name="name" id="name">

                    </div>
                        {{--Error Exception--}}
                        @if($errors->has('name'))
                            <div class="error" style="color: red">
                                {{$errors->first('name')}}
                            </div>

                        @endif

                    <div class="form-group">
                        <label>Designation:</label>
                        <input type="text" class="form-control"  placeholder="Designation" name="designation" id="designation">
                    </div>
                        {{--Error Exception--}}
                        @if($errors->has('designation'))
                            <div class="error" style="color: red">
                                {{$errors->first('designation')}}
                            </div>

                        @endif


                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="avatar" id="avatar"><br>
                        <label class="custom-file-label" for="avatar">Upload Photo</label>
                    </div>

                        {{--Error Exception--}}
                        @if($errors->has('avatar'))
                            <div class="error" style="color: red">
                                {{$errors->first('avatar')}}
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