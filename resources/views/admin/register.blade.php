@extends('layouts.master')


@section('title')

    Register-Roles | Job Finder

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
                    <h4 class="card-title"> Users Table</h4>
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

                            @foreach($users as $user)
                            <tr>
                                <td>
                                    {{$user->id}}
                                </td>
                                <td>

                                        {{$user->name}}
                                </td>
                                <td>
                                    {{$user->user_type}}
                                </td>
                                <td>
                                    {{$user->email}}
                                </td>
                                <td>
                                    <a href="{{route('registered.edit',[$user->id])}}" class="btn btn-info">Edit</a>

                                </td>
                                <td class="text-right">
                                    <a href="{{route('registered.delete',[$user->id])}}" class="btn btn-danger">Delete</a>
                                </td>



                            </tr>



                            @endforeach

                            </tbody>
                        </table>
                        {{$users->links()}}
                    </div>
                </div>
            </div>
        </div>

    </div>


@endsection



@section('script')



@endsection