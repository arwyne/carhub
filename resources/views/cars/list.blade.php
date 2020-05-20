@extends('layouts.template')

@section('title', 'CarHub')

@section('body')
  

    <div class="bg-main">
    
        @if(session('message'))
        <div class="alert alert-primary" role="alert">
                {{ session('message') }}
        </div>
        @endif 


        <div class="main-container">

            <div class="container head-container">
                <div class="row welcome-container">
                    <div class="col-md-10 offset-md-1 text-center">

                        <h2>WELCOME TO CARHUB <span><i class="fas fa-car-side"></i></span></h1>
                        <h3>What We Can Offer</h3>
                        <p>Here at CarHub. We Meet Every Demands/Standards For Self Drive Car Rentals. We Make Everything Hassle Free And Also One of the Cheapest Car Rental Rates In Manila Or in the Philippines Which also offers Short And Long Term Car Rental Lease With Our Well Maintained Cars, Courteous Staff And Drivers</p>
                    </div>

                </div>

                <div class="row offer-container">
                    <div class="col">
                        <div class="offer-header">
                            <span><i class="far fa-lightbulb"></i></span>
                            <h3>SHORT OR LONG TERM LEASING</h3>
                        </div>
                    </div>

                    <div class="col">
                        <div class="offer-header">
                            <span><i class="fas fa-mobile-alt"></i></span>
                            <h3>OTHER SERVICES</h3>
                        </div>
                        <p>Airport transfers,Weddings entourage,cheap car rents for all occasion etc.</p>
                    </div>

                    <div class="col">
                        <div class="offer-header">
                            <span><i class="fas fa-tachometer-alt"></i></span>
                            <h3>EARN EXTRA CASH</h3>
                        </div>

                        <p>Put your car to work</p>
                    </div>

                </div>


                <div class="row process-head-container">
                    <div class="col">
                        <h3>How To Rent A Car</h3>
                    </div>
                </div>

                <div class="row process-container text-center">
                    
                    <div class="col">
                        <span><i class="far fa-hand-point-right"></i></span>
                        <h4>1.CHOOSE</h4>
                    </div>

                    <div class="col">
                        <span><i class="far fa-comment-dots"></i></span>
                        <h4>2.REQUEST</h4>
                    </div>

                    <div class="col">
                        <span><i class="fas fa-map-marker-alt"></i></span>
                        <h4>3.CONFIRM</h4>
                    </div>

                    <div class="col">
                        <span><i class="fas fa-key"></i></span>
                        <h4>4.DRIVE</h4>
                    </div>
                </div>

                
            </div>

            
            
            
            
            


                    
            <div class="container">

                <div class="row">
                    <div class="col">
                        <input type="text" name="search" id="search" class="form-control" placeholder="Search">
                    </div>
                </div>
                
                <div class="row" id="card-container">
                @foreach($cars as $car)
                    <div class="col-md-4">
                        
                            <div class="card">
                            <img class="card-img-top" src="{{ asset($car->image) }}" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $car->model }}</h5>
                                    <p class="card-text"> {{ $car->description }}</p>
                                    <p class="card-text">&#8369; {{ number_format($car->rates) }}/day</p>
                                    <a href="/reservation/{{ $car->id }}" class="btn btn-primary">Rent</a>
                                    <a href="/cars/{{ $car->id }}"><i class="fas fa-ellipsis-h"></i></a>
                                    
                                </div>
                            </div>

                    </div>
                @endforeach
                </div>

            </div>

            
        </div>
    </div>


@endsection

<script src="http://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

<script>
    $(document).ready(function(){
      $("#search").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#card-container div").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
</script>

