@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="company-profile">
                @if(empty(Auth::user()->company->cover_photo))
                    <img style="width: 100%" src="{{asset('cover/banner.jpg')}}" width="100">

                @else
                    <img style="width: 100%"
                         src="{{asset('uploads/cover_photo')}}/{{Auth::user()->company->cover_photo}}"
                    >
                @endif
            </div>
            <div class="company-desc"><br>
                @if(empty(Auth::user()->company->logo))
                    <img  src="{{asset('avatar/logo.png')}}" width="100">

                @else
                    <img
                         src="{{asset('uploads/logo')}}/{{Auth::user()->company->logo}}"
                         width="100" height="200">
                @endif
                <h1>{{$company->cname}}</h1>
                <p><b>{{$company->description}}</b></p>
                <p>
                    <b>Slogan-</b> {{$company->slogan}},<b>Address-</b> {{$company->address}},
                        <b>Phone </b> {{$company->phone}}, <b>Website- </b>{{$company->website}}
                </p>
            </div>

        </div>
        <table class="table">
            <thead>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            </thead>
            <tbody>
            @foreach($company->job as $job)
                <tr>
                    <td>
                        <img src="{{asset('avatar/logo.png')}}" width="80">
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
@endsection
