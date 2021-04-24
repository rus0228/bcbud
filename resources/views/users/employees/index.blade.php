@extends('layouts.app')

@section('navigation')
    @include('navigation.default')
@endsection

@section('content')
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-12 text-center">
                <a type="button" title="Edit" class="btn btn-primary btn-link btn-sm" href="{{route('add_employee')}}">
                    <i class="material-icons">New Event User</i>
                </a>
            </div>
        </div>
        <div class="row" style="margin-top: 10px">
            <div class="col-md-12">
                <table class="table">
                    <thead class=" text-primary">
                    <th>EventUserId</th>
                    <th>EventName</th>
                    <th>Name</th>
                    <th>PhoneNumber</th>
                    <th>LoginCode</th>
                    <th>LogInCodeValidTo</th>
                    <th>Actions</th>
                    </thead>
                    <tbody id="adminUserTblBody">
                    @foreach ($employees as $employee)
                        <tr>
                            <td>{{$employee->id}}</td>
                            <td>{{$employee->event}}</td>
                            <td>{{$employee->name}}</td>
                            <td>{{$employee->phone_number}}</td>
                            <td>{{$employee->code}}</td>
                            <td>{{$employee->code_valid_to}}</td>
                            <td>
                                <a class="btn btn-primary btn-link btn-sm"
                                   href="{{route('edit_employee', ['id' => $employee->id])}}">
                                    <i class="material-icons">edit</i>
                                </a>
                                <a class="btn btn-danger btn-link btn-sm"
                                   href="{{route('delete_employee', ['id' => $employee->id])}}">
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
