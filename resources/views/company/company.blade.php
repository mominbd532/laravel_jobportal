@extends('layouts.main')

@section('content')
    <div class="site-section bg-light">
        <div class="container">
            <div class="row">
                @foreach($companies as $company)
                    <div class="col-md-3">
                        <div class="card" style="width: 18rem;">

                        @if(empty($company->logo))
                            <img class="card-img-top"  src="{{asset('avatar/logo.png')}}">

                        @else
                            <img class="card-img-top"
                                 src="{{asset('uploads/logo')}}/{{$company->logo}}"
                                 >
                        @endif

                        <div class="card-body">
                            <h5 class="card-title">{{$company->cname}}</h5>

                            <a href="{{route('company.index',[$company->id,$company->slug])}}" class="btn btn-primary">Visit Company</a>
                        </div>
                    </div>

                </div>
                @endforeach


            </div>
            {{$company->links}}
        </div>
    </div>

@endsection
