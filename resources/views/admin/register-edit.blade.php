@extends('layouts.master')


@section('title')

    Edit-Register Roles | Job Finder

@endsection


@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit User Details</h4>
                </div>
                <div class="card-body">



                    <div class="row">
                        <div class="col-md-6">
                            Name:  &nbsp; {{$user->name}}

                        </div>

                        <div class="col-md-6">
                            Email:  &nbsp; {{$user->email}}

                        </div>
                    </div>
                    <br>



                    <div class="row">
                        <div class="col-md-6">


                            <form action="{{route('registered.update',[$user->id])}}" method="post">

                                @csrf
                                <div class="form-group">
                                    <label >User Type:</label><br>
                                    <select class="form-control" name="user_type">

                                        @if($user->user_type=='admin')
                                            <option selected>Admin</option>
                                        @else
                                            <option value="admin">Admin</option>
                                        @endif

                                            @if($user->user_type=='seeker')
                                                <option selected>Seeker</option>
                                            @else
                                                <option value="seeker">Seeker</option>
                                            @endif

                                            @if($user->user_type=='employer')
                                                <option selected>Employer</option>
                                            @else
                                                <option value="employer">Employer</option>
                                            @endif

                                            @if($user->user_type=='block')
                                                <option selected>Block</option>
                                            @else
                                                <option value="block">Block</option>
                                            @endif

                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">Upadte</button>
                                <a href="{{route('admin.registered')}}" class="btn btn-danger">Cancel</a>
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