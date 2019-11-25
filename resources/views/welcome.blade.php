@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <search-component></search-component>
            </div>
            <h1>Recent Job</h1>
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
                            @if(empty($job->company->logo))
                                <img  src="{{asset('avatar/logo.png')}}" width="100">

                            @else
                                <img
                                        src="{{asset('uploads/logo')}}/{{$job->company->logo}}"
                                        width="100" height="100">
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
                            <a href="{{route('jobs.show',[$job->id,$job->slug])}}">
                                <button class="btn btn-success btn-sm">Details</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
        <div class="button">
            <a href="{{route('all_jobs')}}">
                <button style="width: 100%" class="btn btn-warning btn-lg">All Jobs</button>
            </a>

        </div><br><br>
        <h1>Features Company:</h1>
        <div class="container">
            <div class="row">
                @foreach($companys as $company)
                <div class="col-md-3">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{$company->cname}}</h5>
                            <p class="card-text">{{str_limit($company->description)}}</p>
                            <a href="{{route('company.index',[$company->id,$company->slug])}}" class="btn btn-primary">Visit Company</a>
                        </div>
                    </div>

                </div>
                    @endforeach

            </div>
        </div>
    </div>
@endsection
