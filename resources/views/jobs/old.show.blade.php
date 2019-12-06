@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if(Session::has('massage'))
                    <div class="alert alert-success">
                        {{Session::get('massage')}}
                    </div>

                @endif
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
                @if(Auth::check())
                  @if(Auth::user()->user_type=='seeker')
                    @if(!$job->checkApplication())

                        <apply-component :jobid={{$job->id}}></apply-component>

                        @else
                        <div class="alert alert-danger">
                            <p>Applied</p>
                        </div>
                    @endif
                      <br>
                        <favorite-component :jobid={{$job->id}} :favorited=
                                {{$job->checkSaved() ? 'true':'false'}}>

                        </favorite-component>

                    @endif
                @endif

            </div>
        </div>
    </div>
@endsection
