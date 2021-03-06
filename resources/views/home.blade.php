@extends('layouts.main')

@section('content')
    <br>
    <div class="site-section bg-light">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(Auth::user()->user_type=='seeker')
                @foreach($jobs as $job)
            <div class="card">
                <div class="card-header">{{$job->title}}</div>

                <div class="card-body">
                    {{$job->description}}
                </div>
                <div class="card-footer">
                    <span >
                        <a href="{{route('jobs.show',[$job->id,$job->slug])}}">More Details</a>
                    </span>
                    <span class="float-right">
                        {{$job->last_date}}
                    </span>
                </div>
            </div>
                @endforeach
                @endif

        </div>
    </div>
</div>

    </div>
@endsection
