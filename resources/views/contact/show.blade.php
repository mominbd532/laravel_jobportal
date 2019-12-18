@extends('layouts.main')

@section('content')
    <br>
    <div class="site-section bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    @if(Session::has('message'))
                        <div class="alert alert-danger">
                            {{Session::get('message')}}
                        </div>

                    @endif
                    <div class="card">
                        <div class="card-header">
                            Messages
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Message</th>
                                        <th>Action</th>
                                    </tr>

                                </thead>
                                <tbody>

                                @foreach($contacts as $contact)

                                    <tr>
                                        <td>{{$contact->name}}</td>
                                        <td>{{$contact->email}}</td>
                                        <td>{{$contact->phone}}</td>
                                        <td>{{$contact->message}}</td>
                                        <td>
                                            <a href="{{route('contact.destroy',[$contact->id])}}" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>

                                    @endforeach

                                </tbody>
                            </table>
                            {{$contacts->links()}}
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection
