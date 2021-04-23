@extends('layouts.app')

@section('navigation')
    @include('navigation.employee')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-right">
                <a type="submit" title="Edit" class="btn btn-danger btn-link btn-sm" href="{{route('employee.add_bid')}}">
                    <i class="material-icons">Manually Insert New Bid</i>
                </a>
                <a type="submit" title="Edit" class="btn btn-danger btn-link btn-sm">
                    <i class="material-icons">Download to excel</i>
                </a>
            </div>
        </div>
        <div class="row" style="margin-top: 10px">
            <div class="col-md-12">
                <table class="table">
                    <thead class=" text-primary">
                    <th>BidId</th>
                    <th>CarNr</th>
                    <th>NumOfBids</th>
                    <th>Name</th>
                    <th>TotalPriceLotteryTickets</th>
                    <th>InvoiceSent</th>
                    <th>PayedByVips</th>
                    <th>PayedManually</th>
                    <th>ReadyForDraw</th>
                    <th>TicketsCreated</th>
                    </thead>
                    <tbody>
                    @foreach ($bids as $bid)
                        <tr>
                            <td>{{$bid->id}}</td>
                            <td>{{$bid->car_number}}</td>
                            <td>{{$bid->number_of_bids}}</td>
                            <td>{{$bid->name}}</td>
                            <td>{{$bid->total_price_lottery_tickets}}</td>
                            <td>{{$bid->invoice_sent}}</td>
                            <td>{{$bid->paid_by_vips}}</td>
                            <td>{{$bid->paid_manually}}</td>
                            <td>{{$bid->ready_for_draw}}</td>
                            <td>{{$bid->tickets_created}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
