@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">My Jobs</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            </thead>
                            <tbody>
                            @foreach($jobs as $job)
                                <tr>
                                    <td>
                                        @if(empty(Auth::user()->company->logo))
                                            <img  src="{{asset('avatar/logo.png')}}" width="60">

                                        @else
                                            <img
                                                 src="{{asset('uploads/logo')}}/{{Auth::user()->company->logo}}"
                                                 width="60">
                                        @endif
                                    </td>
                                    <td>
                                        Position: {{$job->position}}
                                        <br>
                                        Job Type: &nbsp; <i class="fa fa-clock"></i> {{$job->type}}
                                    </td>
                                    <td>
                                        <i class="fa fa-map-marker"></i> &nbsp;Address: {{$job->address}}
                                    </td>
                                    <td>
                                        <i class="fa fa-calendar-check"></i> &nbsp;Date: {{$job->created_at->diffForHumans()}}
                                    </td>
                                    <td>
                                        <a href="{{route('jobs.edit',[$job->id,$job->slug])}}">
                                            <button class="btn btn-warning">Edit</button>
                                        </a>
                                        <a href="{{route('jobs.destroy',[$job->id,$job->slug])}}">
                                            <button class="btn btn-danger">Delete</button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
