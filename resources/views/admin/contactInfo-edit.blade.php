@extends('layouts.master')


@section('title')

    Contact Info Edit | Job Finder

@endsection


@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Contact Info</h4>
                </div>
                <div class="card-body">







                    <div class="row">
                        <div class="col-md-6">
                            @if(Session::has('message'))
                                <div class="alert alert-success">
                                    {{Session::get('message')}}
                                </div>

                            @endif


                            <form action="{{route('contactInfo.update',[$contactInfo->id])}}" method="post">

                                @csrf
                                <div class="form-group">
                                    <label >Address Line 1:</label><br>
                                    <input type="text" class="form-control" value="{{$contactInfo->addressLine1}}" name="addressLine1">

                                </div>

                                {{--Error Exception--}}
                                @if($errors->has('addressLine1'))
                                    <div class="error" style="color: red">
                                        {{$errors->first('addressLine1')}}
                                    </div>

                                @endif
                                <div class="form-group">
                                    <label >Address Line 2:</label><br>
                                    <input type="text" class="form-control" value="{{$contactInfo->addressLine2}}" name="addressLine2">

                                </div>

                                {{--Error Exception--}}
                                @if($errors->has('addressLine2'))
                                    <div class="error" style="color: red">
                                        {{$errors->first('addressLine2')}}
                                    </div>

                                @endif
                                <div class="form-group">
                                    <label >Address Line 3:</label><br>
                                    <input type="text" class="form-control" value="{{$contactInfo->addressLine3}}" name="addressLine3">

                                </div>

                                {{--Error Exception--}}
                                @if($errors->has('addressLine3'))
                                    <div class="error" style="color: red">
                                        {{$errors->first('addressLine3')}}
                                    </div>

                                @endif
                                <div class="form-group">
                                    <label >Service Time 1:</label><br>
                                    <input type="text" class="form-control" value="{{$contactInfo->serviceTime1}}" name="serviceTime1">

                                </div>

                                {{--Error Exception--}}
                                @if($errors->has('serviceTime1'))
                                    <div class="error" style="color: red">
                                        {{$errors->first('serviceTime1')}}
                                    </div>

                                @endif
                                <div class="form-group">
                                    <label >Service Time 2:</label><br>
                                    <input type="text" class="form-control" value="{{$contactInfo->serviceTime2}}" name="serviceTime2">

                                </div>

                                {{--Error Exception--}}
                                @if($errors->has('serviceTime2'))
                                    <div class="error" style="color: red">
                                        {{$errors->first('serviceTime2')}}
                                    </div>

                                @endif
                                <div class="form-group">
                                    <label >Service Time 3:</label><br>
                                    <input type="text" class="form-control" value="{{$contactInfo->serviceTime3}}" name="serviceTime3">

                                </div>

                                {{--Error Exception--}}
                                @if($errors->has('serviceTime3'))
                                    <div class="error" style="color: red">
                                        {{$errors->first('serviceTime3')}}
                                    </div>

                                @endif
                                <div class="form-group">
                                    <label >Phone Number:</label><br>
                                    <input type="text" class="form-control" value="{{$contactInfo->phone}}" name="phone">

                                </div>

                                {{--Error Exception--}}
                                @if($errors->has('phone'))
                                    <div class="error" style="color: red">
                                        {{$errors->first('phone')}}
                                    </div>

                                @endif
                                <div class="form-group">
                                    <label >Email:</label><br>
                                    <input type="email" class="form-control" value="{{$contactInfo->email}}" name="email">

                                </div>

                                {{--Error Exception--}}
                                @if($errors->has('email'))
                                    <div class="error" style="color: red">
                                        {{$errors->first('email')}}
                                    </div>

                                @endif
                                <div class="form-group">
                                    <label >More Info:</label><br>
                                    <textarea class="form-control" name="moreInfo">{{$contactInfo->moreInfo}}
                                    </textarea>

                                </div>

                                {{--Error Exception--}}
                                @if($errors->has('moreInfo'))
                                    <div class="error" style="color: red">
                                        {{$errors->first('moreInfo')}}
                                    </div>

                                @endif

                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="/admin" class="btn btn-danger">Cancel</a>
                            </form>

                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>



@endsection



@section('script')



@endsection