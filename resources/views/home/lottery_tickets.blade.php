@extends('layouts.app')

@section('navigation')
    @include('navigation.employee')
@endsection

@section('content')
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-12 text-right">
                <a type="submit" title="Edit" class="btn btn-danger btn-link btn-sm">
                    <i class="material-icons">Download to excel</i>
                </a>
            </div>
        </div>
        <div class="row" style="margin-top: 10px">
            <div class="col-md-12">
                <table class="table">
                    <thead class=" text-primary">
                        <th>LotteryTicketId</th>
                        <th>BidderId</th>
                        <th>Name</th>
                        <th>CarNr</th>
                        <th>LotteryNr</th>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
