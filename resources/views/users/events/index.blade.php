@extends('layouts.app')

@section('navigation')
    @include('navigation.default')
@endsection

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-12 text-center">
                <a type="button" title="Edit" class="btn btn-primary btn-link btn-sm" href="{{route('add_event')}}">
                    <i class="material-icons">New Event</i>
                </a>
            </div>
        </div>
        <div class="row" style="margin-top: 10px">
            <div class="col-md-12">
                <table class="table">
                    <thead class=" text-primary">
                    <th>EventId</th>
                    <th>UserId</th>
                    <th>Name</th>
                    <th>OpenEvent</th>
                    <th>CloseEvent</th>

                    <th>CostPrBid</th>
                    <th>PreliminaryPublishListTime</th>
                    <th>BidEndTime</th>
                    <th>ListPublishedTime</th>
                    <th>LotteryDrawTime</th>
                    <th>Action</th>
                    </thead>
                    <tbody id="adminUserTblBody">
                    @foreach ($events as $event)
                        <tr>
                            <td>{{$event->id}}</td>
                            <td>{{$event->user_id}}</td>
                            <td>{{$event->name}}</td>
                            <td>{{$event->open_event_datetime}}</td>
                            <td>{{$event->close_event_datetime}}</td>

                            <td>{{$event->cost_per_bid}}</td>
                            <td>{{$event->preliminary_publish_list_time}}</td>
                            <td>{{$event->bid_end_time}}</td>
                            <td>{{$event->list_published_time}}</td>
                            <td>{{$event->lottery_draw_time}}</td>
                            <td>
                                @if ($event->user_id == auth()->user()->id)
                                    <a type="button" title="Edit" class="btn btn-primary btn-link btn-sm">
                                        <i class="material-icons">edit</i>
                                    </a>
                                    <a type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
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
