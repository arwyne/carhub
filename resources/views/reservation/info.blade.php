@extends('layouts.template')

@section('title', 'CarHub')

@section('body')
    
    <div class="container">
        <div class="row">

            <div class="col-md-5">

                <p>Car Model: {{ $car->model }}</p>
                {{-- <p>Car Description: {{ $car->description }}</p> --}}
                <p>Car Transmission: {{ $car->transmission }}</p>
                <p>Pickup Time: {{ $pickup_time }}</p>
                <p>Pickup Date: {{ $pickup_date }}</p>
                <p>Return Date: {{ $return_date }}</p>
                <p>Rent Days: {{ $rent_days }}days </p>
                <p>Car Rates: &#8369;{{ number_format($car->rates) }}/day</p>
                @if(isset($withdriver))
                <p>{{ $withdriver }} (additional &#8369; 2,000/day)</p>
                @endif
                <p>Total Price: &#8369;{{ number_format($total_price) }}</p>
                <p>Payment Mode: {{ $payment_mode }}</p>
           
              
               
                    
            </div>

            <a href="/reservationclear"><button>Delete</button></a>

            
            <a href="/reservationconfirm"><button class="btn btn-primary">Confirm</button></a>

        </div>

    </div>

@endsection