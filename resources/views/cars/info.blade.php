@extends('layouts.template')

@section('title', 'CarHub')

@section('body')


<div class="container-fluid bg-car-info">
    <div class="col-lg-6 offset-lg-5">
    
        <div class="car-info-container">
            <div class="row car-info-header">
                <h3>Car's Information</h3>
            </div>


            
        
                <div class="row car-info-body">
    
                    <div class="col-md-6 car-image">
                        <img class="img-fluid" src="{{ asset($car->image) }}" alt="Card image cap">
                    </div>
                        
                    <div class="col-md-6 car-info">
                        <table class="table">
                            <tr>
                                <td>Car Model:</td>
                                <td>{{ $car->model }}</td>
                            </tr>

                            <tr>
                                <td>Category:</td>
                                <td>{{ $car->category()->first()->category_name }}</td>
                            </tr>

                            <tr>
                                <td>Car Description:</td>
                                <td>{{ $car->description }}</td>
                            </tr>

                            <tr>
                                <td>Car Rates:</td>
                                <td>&#8369; {{ number_format($car->rates) }}/day</td>
                            </tr>

                            <tr>
                                <td>Available Cars:</td>
                                <td>{{ $car->quantity }}</td>
                            </tr>

                            <tr>
                                <td>Transmission:</td>
                                <td>{{ $car->transmission }}</td>
                            </tr>

                            
                        </table>    
                            
                                
                        <div class="col button-container">
                            <a href="/cars/{{ $car->id }}/edit"><button class="btn-block update">Update</button></a>
                            <a href="/cars/{{ $car->id }}/delete"><button class="btn-block delete">Delete</button></a>
                        </div>
                    </div>
                </div>

            
        </div>

     
    </div>
</div>
    
  

@endsection



