@extends('layouts.main')

@section('content')
    <br>
    <div class="site-section bg-light">
        <div class="container">
            <div class="row">
                <h1>All Jobs</h1>&nbsp;&nbsp;&nbsp;
                <form action="{{route('all_jobs')}}" method="get">
                    <div class="form-inline">
                        <div class="form-group">
                            <input type="text" name="title" class="form-control" placeholder="Keyword">
                        </div>&nbsp;&nbsp;
                        <div class="form-group">

                            <select name="type" class="form-control">
                                <option>Select Type</option>
                                <option value="Full Time">Full Time</option>
                                <option value="Part Time">Part Time</option>
                                <option value="Casual">Casual</option>
                            </select>
                        </div>&nbsp;&nbsp;
                        <div class="form-group">
                            <select name="category_id" class="form-control">
                                <option>Select Category</option>
                                @foreach(App\Category::all() as $cat)
                                    <option value="{{$cat->id}}">{{$cat->name}}</option>

                                @endforeach

                            </select>
                        </div>&nbsp;&nbsp;
                        <div class="form-group">
                            <input type="text" name="address" class="form-control" placeholder="Address">
                        </div>&nbsp;&nbsp;
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>

                    </div>

                </form>

                <table class="table">
                    <thead>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    </thead>
                    <tbody>
                    @foreach($jobs as $job)
                        <tr>
                            <td>
                                @if(empty($job->company->logo))
                                    <img  src="{{asset('avatar/logo.png')}}" width="100">

                                @else
                                    <img
                                            src="{{asset('uploads/logo')}}/{{$job->company->logo}}"
                                            width="100" height="100">
                                @endif
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
                {{$jobs->links()}}

            </div>

        </div>
    </div>
@endsection
