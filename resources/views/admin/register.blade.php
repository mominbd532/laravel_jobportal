@extends('layouts.master')


@section('title')

    Register-Roles | Job Finder

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
                <a class="navbar-brand" href="#pablo">User List</a>
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
                    <h4 class="card-title">Admin LIst</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <th>
                                Id
                            </th>
                            <th>
                                Name
                            </th>
                            <th>
                                User Type
                            </th>
                            <th>
                                Email
                            </th>
                            <th>
                                Edit
                            </th>
                            <th class="text-right">
                                Delete
                            </th>
                            </thead>
                            <tbody>

                            @foreach($admins as $admin)
                            <tr>
                                <td>
                                    {{$admin->id}}
                                </td>
                                <td>

                                        {{$admin->name}}
                                </td>
                                <td>
                                    {{$admin->user_type}}
                                </td>
                                <td>
                                    {{$admin->email}}
                                </td>
                                <td>
                                    <!-- Model Button -->
                                    <button  type="button"  class="btn btn-info float-right" data-toggle="modal" data-target="#exampleModal{{$admin->id}}">
                                        Edit
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{$admin->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Admin Role</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        &nbsp;Name:  &nbsp; {{$admin->name}}

                                                    </div>

                                                    <div class="col-md-6">
                                                        Email:  &nbsp; {{$admin->email}}

                                                    </div>
                                                </div>

                                                <form action="{{route('registered.update',[$admin->id])}}" method="post" enctype="multipart/form-data" id="sample_form">
                                                    @csrf

                                                    <div class="modal-body">
                                                        <label >User Type:</label><br>
                                                        <select class="form-control" name="user_type">

                                                            @if($admin->user_type=='admin')
                                                                <option selected>Admin</option>
                                                            @else
                                                                <option value="admin">Admin</option>
                                                            @endif

                                                            @if($admin->user_type=='block')
                                                                <option selected>Block</option>
                                                            @else
                                                                <option value="block">Block</option>
                                                            @endif

                                                        </select>

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
                                    <a href="{{route('registered.delete',[$admin->id])}}" class="btn btn-danger">Delete</a>
                                </td>

                            </tr>



                            @endforeach

                            </tbody>
                        </table>
                        {{$admins->links()}}
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Seeker LIst</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <th>
                                Id
                            </th>
                            <th>
                                Name
                            </th>
                            <th>
                                User Type
                            </th>
                            <th>
                                Email
                            </th>
                            <th>
                                Edit
                            </th>
                            <th class="text-right">
                                Delete
                            </th>
                            </thead>
                            <tbody>

                            @foreach($seekers as $seeker)
                                <tr>
                                    <td>
                                        {{$seeker->id}}
                                    </td>
                                    <td>

                                        {{$seeker->name}}
                                    </td>
                                    <td>
                                        {{$seeker->user_type}}
                                    </td>
                                    <td>
                                        {{$seeker->email}}
                                    </td>
                                    <td>
                                        <!-- Model Button -->
                                        <button  type="button"  class="btn btn-info float-right" data-toggle="modal" data-target="#exampleModal{{$seeker->id}}">
                                            Edit
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{$seeker->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Seeker Role</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            &nbsp;Name:  &nbsp; {{$seeker->name}}

                                                        </div>

                                                        <div class="col-md-6">
                                                            Email:  &nbsp; {{$seeker->email}}

                                                        </div>
                                                    </div>

                                                    <form action="{{route('registered.update',[$seeker->id])}}" method="post" enctype="multipart/form-data" id="sample_form">
                                                        @csrf

                                                        <div class="modal-body">
                                                            <label >User Type:</label><br>
                                                            <select class="form-control" name="user_type">

                                                                @if($seeker->user_type=='seeker')
                                                                    <option selected>Seeker</option>
                                                                @else
                                                                    <option value="admin">Admin</option>
                                                                @endif

                                                                @if($seeker->user_type=='block')
                                                                    <option selected>Block</option>
                                                                @else
                                                                    <option value="block">Block</option>
                                                                @endif

                                                            </select>

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
                                        <a href="{{route('registered.delete',[$seeker->id])}}" class="btn btn-danger">Delete</a>
                                    </td>

                                </tr>



                            @endforeach

                            </tbody>
                        </table>
                        {{$seekers->links()}}
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Employer LIst</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <th>
                                Id
                            </th>
                            <th>
                                Name
                            </th>
                            <th>
                                User Type
                            </th>
                            <th>
                                Email
                            </th>
                            <th>
                                Edit
                            </th>
                            <th class="text-right">
                                Delete
                            </th>
                            </thead>
                            <tbody>

                            @foreach($employers as $employer)
                                <tr>
                                    <td>
                                        {{$employer->id}}
                                    </td>
                                    <td>

                                        {{$employer->name}}
                                    </td>
                                    <td>
                                        {{$employer->user_type}}
                                    </td>
                                    <td>
                                        {{$employer->email}}
                                    </td>
                                    <td>
                                        <!-- Model Button -->
                                        <button  type="button"  class="btn btn-info float-right" data-toggle="modal" data-target="#exampleModal{{$employer->id}}">
                                            Edit
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{$employer->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Employer Role</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            &nbsp;Name:  &nbsp; {{$employer->name}}

                                                        </div>

                                                        <div class="col-md-6">
                                                            Email:  &nbsp; {{$employer->email}}

                                                        </div>
                                                    </div>

                                                    <form action="{{route('registered.update',[$employer->id])}}" method="post" enctype="multipart/form-data" id="sample_form">
                                                        @csrf

                                                        <div class="modal-body">
                                                            <label >User Type:</label><br>
                                                            <select class="form-control" name="user_type">

                                                                @if($employer->user_type=='employer')
                                                                    <option selected>Employer</option>
                                                                @else
                                                                    <option value="admin">Admin</option>
                                                                @endif

                                                                @if($employer->user_type=='block')
                                                                    <option selected>Block</option>
                                                                @else
                                                                    <option value="block">Block</option>
                                                                @endif

                                                            </select>

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
                                        <a href="{{route('registered.delete',[$employer->id])}}" class="btn btn-danger">Delete</a>
                                    </td>

                                </tr>



                            @endforeach

                            </tbody>
                        </table>
                        {{$employers->links()}}
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Blocked LIst</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <th>
                                Id
                            </th>
                            <th>
                                Name
                            </th>
                            <th>
                                User Type
                            </th>
                            <th>
                                Email
                            </th>
                            <th>
                                Edit
                            </th>
                            <th class="text-right">
                                Delete
                            </th>
                            </thead>
                            <tbody>

                            @foreach($blocks as $block)
                                <tr>
                                    <td>
                                        {{$block->id}}
                                    </td>
                                    <td>

                                        {{$block->name}}
                                    </td>
                                    <td>
                                        {{$block->user_type}}
                                    </td>
                                    <td>
                                        {{$block->email}}
                                    </td>
                                    <td>
                                        <!-- Model Button -->
                                        <button  type="button"  class="btn btn-info float-right" data-toggle="modal" data-target="#exampleModal{{$block->id}}">
                                            Edit
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{$block->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Block Role</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            &nbsp;Name:  &nbsp; {{$block->name}}

                                                        </div>

                                                        <div class="col-md-6">
                                                            Email:  &nbsp; {{$block->email}}

                                                        </div>
                                                    </div>

                                                    <form action="{{route('registered.update',[$block->id])}}" method="post" enctype="multipart/form-data" id="sample_form">
                                                        @csrf

                                                        <div class="modal-body">
                                                            <label >User Type:</label><br>
                                                            <select class="form-control" name="user_type">

                                                                    <option value="admin">Admin</option>

                                                                    <option value="seeker">Seeker</option>

                                                                    <option value="employer">Employer</option>


                                                            </select>

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
                                        <a href="{{route('registered.delete',[$block->id])}}" class="btn btn-danger">Delete</a>
                                    </td>

                                </tr>



                            @endforeach

                            </tbody>
                        </table>
                        {{$blocks->links()}}
                    </div>
                </div>
            </div>
        </div>

    </div>


@endsection



@section('script')



@endsection