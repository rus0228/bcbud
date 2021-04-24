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
                <a type="submit" title="Edit" class="btn btn-danger btn-link btn-sm" href="{{route('employee.add_bidder')}}">
                    <i class="material-icons">Manually Insert New Bidder</i>
                </a>
                <a type="submit" title="Edit" class="btn btn-danger btn-link btn-sm" href="{{route('employee.export_bidder')}}">
                    <i class="material-icons">Download to excel</i>
                </a>
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
                    <th>Actions</th>
                    </thead>
                    <tbody>
                    @foreach ($bidders as $bidder)
                        <tr>
                            <td>{{$bidder->id}}</td>
                            <td>{{$bidder->name}}</td>
                            <td>{{$bidder->phone_number}}</td>
                            <td>{{$bidder->code}}</td>
                            <td>{{$bidder->code_valid_to}}</td>
                            <td>
                                <a class="btn btn-primary btn-link btn-sm" href="{{route('employee.edit_bidder', $bidder->id)}}">
                                    <i class="material-icons">edit</i>
                                </a>
                                <a class="btn btn-danger btn-link btn-sm"  href="{{route('employee.delete_bidder', $bidder->id)}}">
                                    <i class="material-icons">remove</i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
