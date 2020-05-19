@extends('layouts.template')

@section('title', 'CarHub')

@section('body')
  

    <div class="container main-container">
    
        @if(session('message'))
        <div class="alert alert-primary" role="alert">
                {{ session('message') }}
        </div>
        @endif 

    </div>

    <div class="container text-center">
        <div class="row">
            <div class="col">
                <h2 class="text-center">WELCOME TO CARHUB</h1>
            </div>
        </div>
        

        <div class="row">
            <div class="col-md-3">
                

            </div>
        </div>
        
    </div>
        

    <div class="container">

        <h3>WORK PROCESS</h3>

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

