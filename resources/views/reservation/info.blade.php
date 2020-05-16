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
                <p>Payment Mode: {{ $payment_mode }}</p>
                <p>Total Price: &#8369;{{ $total_price }}</p>
           
              
               
                    
            </div>

            <a href="/reservationclear"><button>Delete</button></a>

            
            <a href="/reservationconfirm"><button class="btn btn-primary">Confirm</button></a>

        </div>

    </div>

@endsection