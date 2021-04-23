@extends('layouts.app')

@section('navigation')
    @include('navigation.default')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-md-4 text-center">
                                <a href="{{route('get_users')}}">
                                    <h4>Admin Users</h4>
                                </a>
                            </div>
                            <div class="col-md-4 text-center">
                                <a href="{{route('get_events')}}">
                                    <h4>Events</h4>
                                </a>
                            </div>
                            <div class="col-md-4 text-center">
                                <a href="{{route('get_employees')}}">
                                    <h4>Event Users</h4>
                                </a>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 50px">
                            <div class="col-md-12 text-center">
                                <h3>
                                    In this part of the website, we set up users rights, and set up events
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
