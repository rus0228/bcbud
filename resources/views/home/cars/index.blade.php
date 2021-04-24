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
            <div class="col-md-6 text-center">
                <form action="{{route('employee.import_cars')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="file" id="customFile" required>
                    <button type="submit" title="Edit" class="btn btn-primary btn-link btn-sm">
                        <i class="material-icons">Import cars open for bids</i>
                    </button>
                </form>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-5">
                        <a class="btn btn-danger btn-link btn-sm" href="{{route('employee.publish_cars_present')}}" style="width: 100%">
                            <i class="material-icons">Publish cars list at preset time:</i>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <button type="submit" class="btn btn-danger btn-link btn-sm" style="width: 100%">
                            <i class="material-icons">Bidding ends time:</i>
                        </button>
                    </div>
                    <div class="col-md-7">
                        <form action="{{route('employee.set_bidding_end_time')}}" method="POST">
                            @csrf
                            <input type="datetime-local" name="set_bidding_end_time" required>
                            <button type="submit" title="Edit" class="btn btn-primary btn-link btn-sm">
                                <i class="material-icons">Submit</i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <button type="submit" title="Edit" class="btn btn-danger btn-link btn-sm" style="width: 100%">
                            <i class="material-icons">Estimated time of Draw:</i>
                        </button>
                    </div>
                    <div class="col-md-7">
                        <form action="{{route('employee.set_estimated_draw_time')}}" method="POST">
                            @csrf
                            <input type="datetime-local" name="set_estimated_draw_time" required>
                            <button type="submit" title="Edit" class="btn btn-primary btn-link btn-sm">
                                <i class="material-icons">Submit</i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" style="margin-top: 10px">
            <div class="col-md-12">
                <table class="table">
                    <thead class=" text-primary">
                    <th>Event</th>
                    <th>Start Number</th>
                    <th>Competitor Name</th>
                    <th>Car Brand</th>
                    </thead>
                    <tbody>
                    @foreach ($cars as $car)
                        <tr>
                            <td>{{$car->event}}</td>
                            <td>{{$car->start_number}}</td>
                            <td>{{$car->competitor_name}}</td>
                            <td>{{$car->car_brand}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

{{--
@push('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@endpush--}}
