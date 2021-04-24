@extends('layouts.app')

@section('navigation')
    @include('navigation.default')
@endsection

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('update_user') }}">
            @csrf

            <div class="form-group row" style="display: none">
                <label for="id" class="col-md-4 col-form-label text-md-right">{{ __('Id') }}</label>

                <div class="col-md-6">
                    <input id="id" type="text" class="form-control" value="{{$user->id}}" name="id">
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" value="{{$user->name}}" name="name" required autofocus>
                </div>
            </div>

            <div class="row">
                <label class="col-sm-4 col-form-label text-right"
                       style="padding-top: 15px">{{ __('Can Add User?') }}</label>
                <div class="col-sm-8">
                    <div class="form-group">
                        <div class="form-check form-check-radio">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="can_add_user" value="1"
                                        {{ ($user->can_add_user == 1)? "checked" : "" }}>
                                Yes
                                <span class="circle"><span class="check"></span></span>
                            </label>
                        </div>
                        <div class="form-check form-check-radio">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="can_add_user" value="0"
                                        {{ ($user->can_add_user == 0)? "checked" : "" }}>
                                No
                                <span class="circle"><span class="check"></span></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                <div class="col-md-6">
                    <input id="phone_number" type="text" class="form-control" value="{{$user->phone_number}}" name="phone_number" required autofocus>
                </div>
            </div>
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Update') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
