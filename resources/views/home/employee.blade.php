@extends('layouts.app')

@section('navigation')
    @include('navigation.employee')
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Event User Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <a href="{{route('employee.open_cars')}}">
                                    <h4>Cars open for bids list</h4>
                                </a>
                            </div>
                            <div class="col-md-12 text-center">
                                <a href="{{route('employee.get_bidders')}}">
                                    <h4>Bidders list</h4>
                                </a>
                            </div>
                            <div class="col-md-12 text-center">
                                <a href="{{route('employee.get_bids')}}">
                                    <h4>Bids list</h4>
                                </a>
                            </div>
                            <div class="col-md-12 text-center">
                                <a href="{{route('employee.lottery_tickets')}}">
                                    <h4>Lottery Tickets list</h4>
                                </a>
                            </div>
                            <div class="col-md-12 text-center">
                                <a href="{{route('employee.draw_lottery')}}">
                                    <h4>Draw Lottery</h4>
                                </a>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 50px">
                            <div class="col-md-12 text-center">
                                <h3>
                                    In this part of the website, the event users will
                                </h3>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection