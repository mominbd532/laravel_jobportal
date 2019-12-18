@extends('layouts.main')

@section('content')
    <div class="site-wrap">


        <div style="height: 113px;"></div>

        <div class="unit-5 overlay" style="background-image: url({{asset('partial/images/hero_2.jpg')}});">
            <div class="container text-center">
                <h2 class="mb-0">{{$job->position}}</h2>
                <p class="mb-0 unit-6"><a href="/">Home</a> <span class="sep">></span> <span>Job Item</span></p>
            </div>
        </div>

        <div class="site-section bg-light">
            <div class="container">
                <div class="row">
                    @if(Session::has('massage'))
                        <div class="alert alert-success">
                            {{Session::get('massage')}}
                        </div>

                    @endif

                    <div class="col-md-12 col-lg-8 mb-5">



                        <div class="p-5 bg-white">

                            <div class="mb-4 mb-md-5 mr-5">
                                <div class="job-post-item-header d-flex align-items-center">
                                    <h2 class="mr-3 text-black h4">{{$job->position}}</h2>
                                    <div class="badge-wrap">
                                        <span class="border border-warning text-warning py-2 px-4 rounded">{{$job->type}}</span>
                                    </div>
                                </div>
                                <div class="job-post-item-body d-block d-md-flex">
                                    <div class="mr-3"><span class="fl-bigmug-line-portfolio23"></span> <a href="#">{{$job->company->cname}}</a></div>
                                    <div><span class="fl-bigmug-line-big104"></span> <span>{{$job->address}}</span></div>
                                </div>
                            </div>



                            <div class="img-border mb-5">
                                <a href="https://vimeo.com/28959265" class="popup-vimeo image-play">
                  <span class="icon-wrap">
                    <span class="icon icon-play"></span>
                  </span>
                                    <img src="{{asset('partial/images/hero_2.jpg')}}" alt="Image" class="img-fluid rounded">
                                </a>
                            </div>

                            <h3>Description:
                            <a href="#" data-toggle="modal" data-target="#exampleModal1" >
                                <i style="float: right;" class="fas fa-envelope-square"  ></i>
                            </a>
                            </h3>



                            <p>{{$job->description}}</p>


                            @if($job->last_date >= $date)

                                @if(Auth::check())
                                    @if(Auth::user()->user_type=='seeker')
                                        @if(!$job->checkApplication())

                                            <apply-component :jobid={{$job->id}}></apply-component>

                                        @else
                                            <div class="alert alert-danger">
                                                <p>Applied</p>
                                            </div>
                                        @endif
                                    @endif
                                @endif

                                @else

                                <div class="alert alert-danger">
                                    <p>Date Expired</p>
                                </div>

                            @endif
                        </div>
                    </div>

                    <div class="col-lg-4">


                        <div class="p-4 mb-3 bg-white">
                            <h3 class="h5 text-black mb-3">Company Info</h3>
                            <p>Company:  {{$job->company->cname}} </p>
                            <p>Address: {{$job->address}}</p>
                            <p>Job Position: {{$job->position}}</p>
                            <p>Date:{{$job->last_date}} </p>
                            <p><a href="{{route('company.index',[$job->company->id,$job->company->slug])}}"
                                  class="btn btn-primary  py-2 px-4">Company Details</a></p>
                        </div>
                        <div class="p-4 mb-3 bg-white">

                            @if(Auth::check()&&Auth::user()->user_type=='seeker')

                            <favorite-component :jobid={{$job->id}} :favorited={{$job->checkSaved() ? 'true':'false'}}>

                            </favorite-component>

                                @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>



    <!-- Modal -->
    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Send job to your friend.</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('mail')}}" method="post">
                    @csrf
                <div class="modal-body">


                        <input type="hidden" name="job_id" value="{{$job->id}}">
                        <input type="hidden" name="job_slug" value="{{$job->slug}}">
                        <div class="form-group">
                            <label>Your Name:</label>
                            <input type="text" class="form-control" name="your_name">
                        </div>
                        <div class="form-group">
                            <label>Your Email:</label>
                            <input type="email" class="form-control" name="your_email">
                        </div>
                        <div class="form-group">
                            <label>Friend Name:</label>
                            <input type="text" class="form-control" name="friend_name">
                        </div>
                        <div class="form-group">
                            <label>Friend Email:</label>
                            <input type="email" class="form-control" name="friend_email">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Send</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
