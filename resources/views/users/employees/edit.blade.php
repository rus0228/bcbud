@extends('layouts.app')

@section('navigation')
    @include('navigation.default')
@endsection

@section('content')
    <div class="container">
        {{--{{route('update_employee')}}--}}
        <form method="POST" action="{{route('update_employee')}}">
            @csrf
            <div class="form-group row" style="display: none">
                <label for="id" class="col-md-4 col-form-label text-md-right">{{ __('Id') }}</label>

                <div class="col-md-6">
                    <input id="id" type="text" class="form-control" name="id" value="{{$employee->id}}" required autofocus>
                </div>
            </div>
            <div class="form-group row">
                <label for="event" class="col-md-4 col-form-label text-md-right">{{ __('Event') }}</label>

                <div class="col-md-6">
                    <select id="event" name="event" class="form-control" required>
                        @foreach ($events as $event)
                            <option value="{{$event->name}}">{{$event->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" value="{{$employee->name}}" required autofocus>
                </div>
            </div>

            <div class="form-group row">
                <label for="phone_number" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                <div class="col-md-6">
                    <input id="phone_number" type="text" class="form-control" name="phone_number" value="{{$employee->phone_number}}" required autofocus>
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
