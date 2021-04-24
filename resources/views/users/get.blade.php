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
        @if (auth()->user()->can_add_user == 1)
            <div class="row">
                <div class="col-md-12 text-center">
                    <a type="button" title="Edit" class="btn btn-primary btn-link btn-sm" href="{{route('add_user')}}">
                        <i class="material-icons">New Admin User</i>
                    </a>
                </div>
            </div>
        @endif
        <div class="row" style="margin-top: 10px">
            <div class="col-md-12">
                <table class="table">
                    <thead class=" text-primary">
                    <th>UserId</th>
                    <th>Name</th>
                    <th>CanAddAdminUser</th>
                    <th>PhoneNumber</th>
                    <th>LoginCode</th>
                    <th>LoginCodeValidTo</th>
                    <th>Action</th>
                    </thead>
                    <tbody id="adminUserTblBody">
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->can_add_user}}</td>
                            <td>{{$user->phone_number}}</td>
                            <td>{{$user->code}}</td>
                            <td>{{$user->code_valid_to}}</td>
                            <td>
                                @if ($user->can_add_user === 1)
                                    <a class="btn btn-primary btn-link btn-sm" href="{{route('edit_user', ['id' => $user->id])}}">
                                        <i class="material-icons">edit</i>
                                    </a>
                                    <a class="btn btn-danger btn-link btn-sm" href="{{route('delete_user', ['id' => $user->id])}}">
                                        <i class="material-icons">remove</i>
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
