@extends('layouts.main')

@section('content')
    <br>
    <div style="height: 113px;"></div>

    <div class="unit-5 overlay" style="background-image: url('partial/images/hero_1.jpg');">
        <div class="container text-center">
            <h2 class="mb-0">About Us</h2>
            <p class="mb-0 unit-6"><a href="index.html">Home</a> <span class="sep">></span> <span>About Us</span></p>
        </div>
    </div>


    <div class="site-section" data-aos="fade">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mb-5 mb-md-0">

                    <div class="img-border">
                        <a href="https://vimeo.com/28959265" class="popup-vimeo image-play">
                  <span class="icon-wrap">
                    <span class="icon icon-play"></span>
                  </span>
                            <img src="{{asset('partial/images/hero_1.jpg')}}" alt="Image" class="img-fluid rounded">
                        </a>
                    </div>

                </div>
                <div class="col-md-5 ml-auto">
                    <div class="text-left mb-5 section-heading">
                        <h2>About Us</h2>
                    </div>

                    <p class="mb-4 h5 font-italic lineheight1-5">&ldquo;{{$aboutUs->description}}&rdquo;</p>
                    <p>&mdash; <strong class="text-black font-weight-bold">{{$aboutUs->name}}</strong>, {{$aboutUs->designation}}</p>
                    <p><a href="https://vimeo.com/28959265" class="popup-vimeo text-uppercase">Watch Video <span class="icon-arrow-right small"></span></a></p>
                </div>
            </div>
        </div>
    </div>


    <div class="site-section bg-light">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <!-- <div class="col-md-7 text-center"> -->
                <div class="col-md-6 mx-auto text-center mb-5 section-heading">
                    <h2 class="mb-5">The Team</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum magnam illum maiores adipisci pariatur, eveniet.</p>
                </div>

                <!-- </div> -->
            </div>

            <div class="row team">
                @foreach($ourTeams as $ourTeam)
                <div class="col-lg-2 col-md-4 col-sm-6 col-12" data-aos="fade" data-aos-delay="100">
                    <a href="#" class="person">
                        @if(empty($ourTeam->avatar))
                            <img  src="{{asset('avatar/logo.png')}}" alt="Image placeholder">

                        @else
                            <img src="{{asset('uploads/avatar')}}/{{$ourTeam->avatar}}" alt="Image placeholder">
                        @endif

                        <h2>{{$ourTeam->name}}</h2>
                        <p>{{$ourTeam->designation}}</p>
                    </a>
                </div>

                    @endforeach


            </div>
        </div>
    </div>
@endsection
