@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{$job->title}}</div>

                    <div class="card-body">

                        <p>
                            <h3>Description</h3>{{$job->description}}
                        </p>
                        <p>
                            <h3>Duties</h3>{{$job->roles}}
                        </p>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Short Index</div>
                    <div class="card-body">
                        <p>Company: <a href="{{route('company.index',[$job->company->id,$job->company->slug])}}">
                                {{$job->company->cname}}</a> </p>
                        <p>Address: {{$job->address}}</p>
                        <p>Job Position: {{$job->position}}</p>
                        <p>Date:{{$job->last_date}} </p>
                    </div>

                </div>
                @if(Auth::user()->user_type=='seeker')
                    @if(!$job->checkApplication())

                    <form action="{{route('jobs.apply',[$job->id])}}" method="post">
                        @csrf
                        <button style="width: 100%" class="btn btn-success">Apply</button>

                        @if(Session::has('massage'))
                            <div class="alert alert-success">
                                {{Session::get('massage')}}
                            </div>

                            @endif

                        @endif
                    </form>

                @endif
            </div>
        </div>
    </div>
@endsection
