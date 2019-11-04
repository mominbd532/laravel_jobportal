@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Post Your Job</div>

                    <div class="card-body">

                        <form action="{{route('jobs.store')}}" method="post">
                            @csrf
                       <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" name="title">
                        </div>

                            {{--Error Exception--}}
                            @if($errors->has('title'))
                                <div class="error" style="color: red">
                                    {{$errors->first('title')}}
                                </div>

                            @endif

                        <div class="form-group">
                            <label>Roles</label>
                            <input type="text" class="form-control" name="roles">
                        </div>

                            {{--Error Exception--}}
                            @if($errors->has('roles'))
                                <div class="error" style="color: red">
                                    {{$errors->first('roles')}}
                                </div>

                            @endif

                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" name="description"></textarea>
                        </div>

                            {{--Error Exception--}}
                            @if($errors->has('description'))
                                <div class="error" style="color: red">
                                    {{$errors->first('description')}}
                                </div>

                            @endif

                        <div class="form-group">
                            <label>Category</label>
                            <select name="category_id" class="form-control">
                                @foreach(App\Category::all() as $cat)
                                    <option value="{{$cat->id}}">{{$cat->name}}</option>

                                    @endforeach

                            </select>
                        </div>
                            {{--Error Exception--}}
                            @if($errors->has('category_id'))
                                <div class="error" style="color: red">
                                    {{$errors->first('category_id')}}
                                </div>

                            @endif

                        <div class="form-group">
                            <label>Position</label>
                            <input type="text" class="form-control" name="position">
                        </div>

                            {{--Error Exception--}}
                            @if($errors->has('position'))
                                <div class="error" style="color: red">
                                    {{$errors->first('position')}}
                                </div>

                            @endif

                        <div class="form-group">
                            <label>Address</label>
                            <textarea class="form-control" name="address">
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
                            <select name="type" class="form-control">
                                <option value="Full Time">Full Time</option>
                                <option value="Part Time">Part Time</option>
                                <option value="Casual">Casual</option>
                            </select>
                        </div>

                            {{--Error Exception--}}
                            @if($errors->has('type'))
                                <div class="error" style="color: red">
                                    {{$errors->first('type')}}
                                </div>

                            @endif

                        <div class="form-group">
                            <label>Status</label>
                            <input type="text" class="form-control" name="status">
                        </div>

                            {{--Error Exception--}}
                            @if($errors->has('status'))
                                <div class="error" style="color: red">
                                    {{$errors->first('status')}}
                                </div>

                            @endif

                        <div class="form-group">
                            <label>Last Date</label>
                            <input type="date" class="form-control" name="last_date">
                        </div>

                            {{--Error Exception--}}
                            @if($errors->has('last_date'))
                                <div class="error" style="color: red">
                                    {{$errors->first('last_date')}}
                                </div>

                            @endif

                        <div class="form-group">
                            <button class="btn btn-primary">Submit</button>
                        </div>

                            @if(Session::has('massage'))
                                <div class="alert alert-success">
                                    {{Session::get('massage')}}
                                </div>

                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
