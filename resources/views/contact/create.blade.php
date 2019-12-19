@extends('layouts.main')

@section('content')
    <br>
    <div style="height: 113px;"></div>

    <div class="unit-5 overlay" style="background-image: url('partial/images/hero_1.jpg');">
        <div class="container text-center">
            <h2 class="mb-0">Contact</h2>
            <p class="mb-0 unit-6"><a href="index.html">Home</a> <span class="sep">></span> <span>Contact</span></p>
        </div>
    </div>


    <div class="site-section bg-light">
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-lg-8 mb-5">
                    @if(Session::has('message'))
                        <div class="alert alert-success">
                            {{Session::get('message')}}
                        </div>

                    @endif



                    <form action="{{route("contact.send")}}" method="post" class="p-5 bg-white">

                        @csrf
                        <div class="row form-group">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="font-weight-bold" for="fullname">Full Name</label>
                                <input type="text" id="fullname" class="form-control" placeholder="Full Name" name="name">
                            </div>
                        </div>

                        {{--Error Exception--}}
                        @if($errors->has('name'))
                            <div class="error" style="color: red">
                                {{$errors->first('name')}}
                            </div>

                        @endif
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="font-weight-bold" for="email">Email</label>
                                <input type="email" id="email" class="form-control" placeholder="Email Address" name="email">
                            </div>
                        </div>

                        {{--Error Exception--}}
                        @if($errors->has('email'))
                            <div class="error" style="color: red">
                                {{$errors->first('email')}}
                            </div>

                        @endif


                        <div class="row form-group">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="font-weight-bold" for="phone">Phone</label>
                                <input type="number" id="phone" class="form-control" placeholder="Phone #" name="phone">
                            </div>
                        </div>

                        {{--Error Exception--}}
                        @if($errors->has('phone'))
                            <div class="error" style="color: red">
                                {{$errors->first('phone')}}
                            </div>

                        @endif

                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="font-weight-bold" for="message">Message</label>
                                <textarea name="message" id="message" cols="30" rows="5" class="form-control" placeholder="Say hello to us"></textarea>
                            </div>
                        </div>

                        {{--Error Exception--}}
                        @if($errors->has('message'))
                            <div class="error" style="color: red">
                                {{$errors->first('message')}}
                            </div>

                        @endif

                        <div class="row form-group">
                            <div class="col-md-12">
                                <input type="submit" value="Send Message" class="btn btn-primary pill px-4 py-2">
                            </div>
                        </div>


                    </form>
                </div>

                <div class="col-lg-4">
                    <div class="p-4 mb-3 bg-white">
                        <h3 class="h5 text-black mb-3">Contact Info</h3>
                        <p class="mb-0 font-weight-bold">Address</p>
                        <p class="mb-4">{{$contactInfo->addressLine1}}&nbsp;{{$contactInfo->addressLine2}}&nbsp;{{$contactInfo->addressLine3}}</p>

                        <p class="mb-0 font-weight-bold">Phone</p>
                        <p class="mb-4"><a href="#">{{$contactInfo->phone}}</a></p>

                        <p class="mb-0 font-weight-bold">Email Address</p>
                        <p class="mb-0"><a href="#">{{$contactInfo->email}}</a></p>

                    </div>

                    <div class="p-4 mb-3 bg-white">
                        <h3 class="h5 text-black mb-3">More Info</h3>
                        <p>{{$contactInfo->moreInfo}}</p>
                        <p><a href="#" class="btn btn-primary px-4 py-2 text-white pill">Learn More</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-5 quick-contact-info">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div>
                        <h2><span class="icon-room"></span> Location</h2>
                        <p class="mb-0">{{$contactInfo->addressLine1}}<br>{{$contactInfo->addressLine2}}<br>{{$contactInfo->addressLine3}}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div>
                        <h2><span class="icon-clock-o"></span> Service Times</h2>
                        <p class="mb-0">{{$contactInfo->serviceTime1}}<br>
                            {{$contactInfo->serviceTime2}} <br>
                            {{$contactInfo->serviceTime3}}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <h2><span class="icon-comments"></span> Get In Touch</h2>
                    <p class="mb-0">Email: {{$contactInfo->email}} <br>
                        Phone: {{$contactInfo->phone}} </p>
                </div>
            </div>
        </div>
    </div>
@endsection
