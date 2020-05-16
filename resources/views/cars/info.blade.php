@extends('layouts.template')

@section('title', 'CarHub')

@section('body')
    
    <div class="container">
        <div class="row">
           
                <div class="col-md-5 offset-1">
                    <div>
                        <img class="img-fluid" src="{{ asset($car->image) }}" alt="Card image cap">
                    </div>
                </div>
                <div class="col-md-5">
                    <p class="">{{ $car->model }}</p>
                    <p class=""> {{ $car->description }}</p>
                    <p class="">&#8369; {{ number_format($car->rates) }}/day</p>
                    
                    <p class=""> {{ $car->quantity }}</p>
                    <p class=""> {{ $car->transmission }}</p>

                    <a href="/cars/{{ $car->id }}/edit">Update</a>
                    <a href="/cars/{{ $car->id }}/delete">Delete</a>
                        
                </div>

                </div>

        </div>

    </div>


@endsection