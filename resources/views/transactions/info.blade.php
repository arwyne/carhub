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
                    <img class="img-fluid" src="{{ asset($reservation->car()->first()->image) }}" alt="Card image cap">
                </div>
            </div>
            <div class="col-md-5">
                <p>Reference No: {{ $reservation->reference_no }}</p>
                <p>Customer Name: <a href="#">{{ $reservation->user()->first()->firstname . " " . $reservation->user()->first()->lastname }}</a></p>
                <p>Reservation Created: {{ Carbon\Carbon::parse($reservation->reservation_created)->isoFormat('M/D/YY HH:mm a') }}</p>
                <p>Category:  {{ $reservation->car()->first()->category()->first()->category_name }}</p>
                <p>Car Model: <a href="/cars/{{$reservation->car()->first()->id}}">{{ $reservation->car()->first()->model }}</a></p>
                <p>
                    Car Rate: &#8369;{{ $reservation->car()->first()->rates }}/day
                    @if(isset($reservation->withdriver))
                        <p>w/ Driver (additional &#8369; 2,000/day)</p>
                    @endif
                </p>
                <p>Pickup Time: {{ Carbon\Carbon::parse($reservation->pickup_time)->isoFormat('h:mm a') }}</p>
                <p>Pickup Date: {{  Carbon\Carbon::parse($reservation->pickup_date)->isoFormat('M/D/YY') }}</p>
                <p>Return Date: {{ Carbon\Carbon::parse($reservation->return_date)->isoFormat('M/D/YY') }}</p>
                <p>Rent Days: {{ $reservation->rent_days}}days</p>
                <p>Total Price: &#8369;{{ number_format($reservation->total_price) }}</p>
                <p>Payment Mode: {{ $reservation->payment_mode()->first()->payment_mode_name }}</p>
                <p>Status: {{ $reservation->status()->first()->status_name }}</p>

                <a href="/transactions/{{ $reservation->id }}/edit"><button>Update</button></a>
                <a href="/transactions/{{ $reservation->id }}/delete"><button>Delete</button></a>
                

            </div>

        </div>


    </div>


@endsection