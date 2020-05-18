@extends('layouts.template')

@section('title', 'CarHub')

@section('body')
    
    <div class="container">
        @if(session('message'))
            <div class="alert alert-primary" role="alert">
                {{ session('message') }}
            </div>
        @endif
        <div class="row">
           
            <div class="col-md-5 offset-1">
                <div>
                    <img class="img-fluid" src="{{ asset($car->image) }}" alt="Card image cap">
                </div>
            </div>
            <div class="col-md-5">
                <p>Reference No: {{ $reservation->reference_no }}</p>
                <p>Car Model: {{ $car->model }}</p>
                <p>Car Description: {{ $car->description }}</p>
                <p>Car Transmission: {{ $car->transmission }}</p>
                <p>Pickup Time: {{ $pickup_time }}</p>
                <p>Pickup Date: {{ $pickup_date }}</p>
                <p>Return Date: {{ $return_date }}</p>
                <p>Rent Days: {{ $reservation->rent_days}}days</p>
                <p>Total Price: &#8369;{{ number_format($reservation->total_price) }}</p>
                <p>Payment Mode: {{ $payment_mode->payment_mode_name }}</p>
                
                @if($reservation->status_id == 1)
                    <a href="/profile/reservation/{{$reservation->id}}/cancel"><button class="btn btn-danger">Cancel Reservation</button></a>
                @elseif($reservation->status_id == 2)
                    <p>Deployed</p>
                @else
                    <p>Returned</p>
                @endif

            </div>

        </div>


    </div>


@endsection