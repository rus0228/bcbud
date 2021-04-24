@extends('layouts.app')

@section('navigation')
    @include('navigation.employee')
@endsection

@section('content')
    <div class="container">
        <form method="POST" action="{{route('employee.add_bid')}}">
            @csrf
            <div class="form-group row">
                <label for="car_number" class="col-md-4 col-form-label text-md-right">{{ __('Car Number') }}</label>

                <div class="col-md-6">
                    <select name="car_number" class="form-control">
                        @foreach ($cars as $car)
                            <option value="{{$car->start_number}}">
                                {{$car->start_number}} - {{$car->competitor_name}} - {{$car->car_brand}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="number_of_bids" class="col-md-4 col-form-label text-md-right">{{ __('NumOfBids') }}</label>

                <div class="col-md-6">
                    <input type="text" class="form-control" name="number_of_bids" required autofocus>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                <div class="col-md-6">
                    <input type="text" class="form-control" name="name" required autofocus>
                </div>
            </div>
            <div class="form-group row">
                <label for="total_price_lottery_tickets" class="col-md-4 col-form-label text-md-right">{{ __('TotalPriceLotteryTickets') }}</label>

                <div class="col-md-6">
                    <input type="text" class="form-control" name="total_price_lottery_tickets" required autofocus>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-4 col-form-label text-right"
                       style="padding-top: 15px">{{ __('InvoiceSent') }}</label>
                <div class="col-sm-8">
                    <div class="form-group">
                        <div class="form-check form-check-radio">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="invoice_sent" value="1" required>
                                Yes
                                <span class="circle"><span class="check"></span></span>
                            </label>
                        </div>
                        <div class="form-check form-check-radio">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="invoice_sent" value="0" required>
                                No
                                <span class="circle"><span class="check"></span></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="paid_by_vips" class="col-md-4 col-form-label text-md-right">{{ __('PayedByVips') }}</label>

                <div class="col-md-6">
                    <input type="text" class="form-control" name="paid_by_vips" required autofocus>
                </div>
            </div>
            <div class="form-group row">
                <label for="paid_manually" class="col-md-4 col-form-label text-md-right">{{ __('PayedManually') }}</label>

                <div class="col-md-6">
                    <input type="text" class="form-control" name="paid_manually" required autofocus>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-4 col-form-label text-right"
                       style="padding-top: 15px">{{ __('ReadyForDraw') }}</label>
                <div class="col-sm-8">
                    <div class="form-group">
                        <div class="form-check form-check-radio">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="ready_for_draw" value="1" required>
                                Yes
                                <span class="circle"><span class="check"></span></span>
                            </label>
                        </div>
                        <div class="form-check form-check-radio">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="ready_for_draw" value="0" required>
                                No
                                <span class="circle"><span class="check"></span></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label text-right"
                       style="padding-top: 15px">{{ __('TicketsCreated') }}</label>
                <div class="col-sm-8">
                    <div class="form-group">
                        <div class="form-check form-check-radio">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="tickets_created" value="1" required>
                                Yes
                                <span class="circle"><span class="check"></span></span>
                            </label>
                        </div>
                        <div class="form-check form-check-radio">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="tickets_created" value="0" required>
                                No
                                <span class="circle"><span class="check"></span></span>
                            </label>
                        </div>
                    </div>
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
