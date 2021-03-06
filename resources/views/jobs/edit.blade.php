@extends('layouts.main')

@section('content')
    <br>
    <div class="site-section bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Update Your Job</div>

                    <div class="card-body">

                        <form action="{{route('jobs.update',[$job->id,$job->slug])}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Title</label>
                                <input value="{{$job->title}}" type="text" class="form-control" name="title">
                            </div>

                            {{--Error Exception--}}
                            @if($errors->has('title'))
                                <div class="error" style="color: red">
                                    {{$errors->first('title')}}
                                </div>

                            @endif



                            <div class="form-group">
                                <label>Roles</label>
                                <input value="{{$job->roles}}" type="text" class="form-control" name="roles">
                            </div>

                            {{--Error Exception--}}
                            @if($errors->has('roles'))
                                <div class="error" style="color: red">
                                    {{$errors->first('roles')}}
                                </div>

                            @endif



                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="description">{{$job->description}}
                                </textarea>
                            </div>

                            {{--Error Exception--}}
                            @if($errors->has('description'))
                                <div class="error" style="color: red">
                                    {{$errors->first('description')}}
                                </div>

                            @endif



                            <div class="form-group">
                                <label>Category</label>
                                <select  name="category_id" class="form-control">
                                    @foreach(App\Category::all() as $cat)


                                        <option value="{{$cat->id}}" {{$job->category_id=="$cat->id"? "selected":""}}>{{$cat->name}}</option>


                                    @endforeach

                                </select>
                            </div>


                            <div class="form-group">
                                <label>Position</label>
                                <input value="{{$job->position}}" type="text" class="form-control" name="position">
                            </div>

                            {{--Error Exception--}}
                            @if($errors->has('position'))
                                <div class="error" style="color: red">
                                    {{$errors->first('position')}}
                                </div>

                            @endif



                            <div class="form-group">
                                <label>Address</label>
                                <textarea class="form-control" name="address">{{$job->address}}
                            </textarea>
                            </div>

                            {{--Error Exception--}}
                            @if($errors->has('address'))
                                <div class="error" style="color: red">
                                    {{$errors->first('address')}}
                                </div>

                            @endif



                            <div class="form-group">
                                <label>Job Type</label>
                                <select  name="type" class="form-control">
                                    @if($job->type=='Full Time')
                                        <option selected>{{$job->type}}</option>
                                    @else
                                    <option value="Full Time">Full Time</option>
                                    @endif

                                        @if($job->type=='Part Time')
                                            <option selected>{{$job->type}}</option>
                                        @else
                                            <option value="Part Time">Part Time</option>
                                        @endif


                                        @if($job->type=='Casual')
                                            <option selected>{{$job->type}}</option>
                                        @else
                                            <option value="Casual">Casual</option>
                                        @endif

                                </select>
                            </div>



                            <div class="form-group">
                                <label>Status</label>
                                <input value="{{$job->status}}" type="text" class="form-control" name="status">
                            </div>

                            {{--Error Exception--}}
                            @if($errors->has('status'))
                                <div class="error" style="color: red">
                                    {{$errors->first('status')}}
                                </div>

                            @endif



                            <div class="form-group">
                                <label>Last Date</label>
                                <input value="{{$job->last_date}}" type="date" class="form-control" name="last_date">
                            </div>

                            {{--Error Exception--}}
                            @if($errors->has('last_date'))
                                <div class="error" style="color: red">
                                    {{$errors->first('last_date')}}
                                </div>

                            @endif


                            <div class="form-group">
                                <button class="btn btn-primary">Update</button>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
