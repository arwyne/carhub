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
                <p>Rent Days: {{ $reservation->rent_days}}</p>
                <p>Pament Mode: {{ $payment_mode->payment_mode_name }}</p>
                <p>Total Price: &#8369;{{ $reservation->total_price }}</p>
                
                
                <a href="/profile/reservation/{{$reservation->id}}/cancel"><button class="btn btn-danger">Cancel Reservation</button></a>
                    
            </div>

        </div>


    </div>


@endsection