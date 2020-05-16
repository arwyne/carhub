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
            
            
            @foreach($cars as $car)
                <div class="col-md-3">
                
                    <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{ asset($car->image) }}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{ $car->model }}</h5>
                            <p class="card-text"> {{ $car->description }}</p>
                            <p class="card-text">&#8369; {{ number_format($car->rates) }}/day</p>
                            <a href="/reservation/{{ $car->id }}" class="btn btn-primary">Rent</a>
                            {{-- <form action="/cars/{{ $car->id }}" method="GET">
                                @csrf
                                <button type="submit" class="btn btn-warning">Update</button>
                            </form> --}}
                            <a href="/cars/{{ $car->id }}"><i class="fas fa-ellipsis-h"></i></a>
                            
                        </div>
                    </div>

                </div>
            @endforeach
          

        </div>

    </div>


@endsection