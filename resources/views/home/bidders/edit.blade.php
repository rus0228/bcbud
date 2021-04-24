@extends('layouts.app')

@section('navigation')
    @include('navigation.employee')
@endsection

@section('content')
    <div class="container">
        <form method="POST" action="{{route('employee.update_bidder')}}">
            @csrf
            <div class="form-group row" style="display: none">
                <label for="id" class="col-md-4 col-form-label text-md-right">{{ __('Id') }}</label>

                <div class="col-md-6">
                    <input type="text" class="form-control" name="id" value="{{$bidder->id}}" required autofocus>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                <div class="col-md-6">
                    <input type="text" class="form-control" name="name" value="{{$bidder->name}}" required autofocus>
                </div>
            </div>
            <div class="form-group row">
                <label for="phone_number" class="col-md-4 col-form-label text-md-right">{{ __('PhoneNumber') }}</label>

                <div class="col-md-6">
                    <input type="text" class="form-control" name="phone_number" value="{{$bidder->phone_number}}" required autofocus>
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
