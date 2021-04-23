@extends('layouts.app')

@section('navigation')
    @include('navigation.default')
@endsection

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('add_event') }}">
            @csrf
            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Event Name') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" required autofocus>
                </div>
            </div>
            <div class="form-group row">
                <label for="open_event" class="col-md-4 col-form-label text-md-right">{{ __('Open Event') }}</label>

                <div class="col-md-6">
                    <input id="open_event" type="text" class="form-control" name="open_event" required autofocus>
                </div>
            </div>
            <div class="form-group row">
                <label for="close_event" class="col-md-4 col-form-label text-md-right">{{ __('Close Event') }}</label>

                <div class="col-md-6">
                    <input id="close_event" type="text" class="form-control" name="close_event" required autofocus>
                </div>
            </div>

            <div class="form-group row">
                <label for="cost_per_bid" class="col-md-4 col-form-label text-md-right">{{ __('CostPrBid') }}</label>

                <div class="col-md-6">
                    <input id="cost_per_bid" type="text" class="form-control" name="cost_per_bid" required autofocus>
                </div>
            </div>
            <div class="form-group row">
                <label for="preliminary_publish_list_time" class="col-md-4 col-form-label text-md-right">{{ __('PreliminaryPublishListTime') }}</label>

                <div class="col-md-6">
                    <input id="preliminary_publish_list_time" type="text" class="form-control" name="preliminary_publish_list_time" required autofocus>
                </div>
            </div>

            <div class="form-group row">
                <label for="bid_end_time" class="col-md-4 col-form-label text-md-right">{{ __('BidEndTime') }}</label>

                <div class="col-md-6">
                    <input id="bid_end_time" type="text" class="form-control" name="bid_end_time" required autofocus>
                </div>
            </div>

            <div class="form-group row">
                <label for="list_published_time" class="col-md-4 col-form-label text-md-right">{{ __('ListPublishedTime') }}</label>

                <div class="col-md-6">
                    <input id="list_published_time" type="text" class="form-control" name="list_published_time" required autofocus>
                </div>
            </div>

            <div class="form-group row">
                <label for="lottery_draw_time" class="col-md-4 col-form-label text-md-right">{{ __('LotteryDrawTime') }}</label>

                <div class="col-md-6">
                    <input id="lottery_draw_time" type="text" class="form-control" name="lottery_draw_time" required autofocus>
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Add') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
