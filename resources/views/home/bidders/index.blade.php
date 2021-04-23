@extends('layouts.app')

@section('navigation')
    @include('navigation.employee')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-right">
                <button type="submit" title="Edit" class="btn btn-danger btn-link btn-sm">
                    <i class="material-icons">Manually Insert New Bidder</i>
                </button>
                <button type="submit" title="Edit" class="btn btn-danger btn-link btn-sm">
                    <i class="material-icons">Download to excel</i>
                </button>
            </div>
        </div>
        <div class="row" style="margin-top: 10px">
            <div class="col-md-12">
                <table class="table">
                    <thead class=" text-primary">
                    <th>BidderId</th>
                    <th>Name</th>
                    <th>PhoneNumber</th>
                    <th>Code</th>
                    <th>CodeValidTo</th>
                    </thead>
                    <tbody>
                    @foreach ($bidders as $bidder)
                        <tr>
                            <td>{{$bidder->id}}</td>
                            <td>{{$bidder->name}}</td>
                            <td>{{$bidder->phone_number}}</td>
                            <td>{{$bidder->code}}</td>
                            <td>{{$bidder->code_valid_to}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
