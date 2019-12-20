@extends('layouts.master')


@section('title')

    Contact Info Edit | Job Finder

@endsection


@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit About Us</h4>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6">
                            @if(Session::has('message'))
                                <div class="alert alert-success">
                                    {{Session::get('message')}}
                                </div>

                            @endif


                            <form action="{{route('aboutUs.update',[$aboutUs->id])}}" method="post">

                                @csrf

                                <div class="form-group">
                                    <label >Description:</label><br>
                                    <textarea class="form-control" name="description">{{$aboutUs->description}}
                                    </textarea>

                                </div>

                                {{--Error Exception--}}
                                @if($errors->has('description'))
                                    <div class="error" style="color: red">
                                        {{$errors->first('description')}}
                                    </div>

                                @endif

                                <div class="form-group">
                                    <label >Name:</label><br>
                                    <input type="text" class="form-control" value="{{$aboutUs->name}}" name="name" >

                                </div>

                                {{--Error Exception--}}
                                @if($errors->has('name'))
                                    <div class="error" style="color: red">
                                        {{$errors->first('name')}}
                                    </div>

                                @endif

                                <div class="form-group">
                                    <label >Designation:</label><br>
                                    <input type="text" class="form-control" value="{{$aboutUs->designation}}" name="designation">

                                </div>

                                {{--Error Exception--}}
                                @if($errors->has('designation'))
                                    <div class="error" style="color: red">
                                        {{$errors->first('designation')}}
                                    </div>

                                @endif

                                <button type="submit" class="btn btn-primary">Update</button>
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