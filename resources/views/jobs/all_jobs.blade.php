@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
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
            {{$jobs->links()}}

        </div>

    </div>
@endsection
