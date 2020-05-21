@extends('layouts.template')

@section('title', 'CarHub')

@section('body')
    
<div class="container-fluid bg-prof-status">
    <div class="col-lg-6 col-md-9 offset-md-1 offset-lg-5">
        @if(session('message'))
        <div class="alert alert-primary" role="alert">
            {{ session('message') }}
        </div>
        @endif
    
            <div class="prof-status-container">
                <div class="row prof-status-header">
                    <h3>Reservation Status</h3>
                </div>


                    <div class="row prof-status-body">
        
                        <div class="col-lg-5 col-md-6 reserve-image">
                            <div class="image-container">
                                <img class="img-fluid" src="{{ asset($car->image) }}" alt="Card image cap">
                            </div>
                            <h3 class="text-center">
                                <a href="/cars/{{$reservation->car()->first()->id}}">{{ $reservation->car()->first()->model }}</a>
                            </h3>
                        </div>
                            


                        <div class="col-lg-7 col-md-6 reserve-info">
                            <table class="table">

                                <tr>
                                    <td class="row-header">Reference No:</td>
                                    <td>{{ $reservation->reference_no }}</td>
                                </tr>
                                
                                <tr>
                                    <td class="row-header">Reservation Created:</td>
                                    <td>{{ Carbon\Carbon::parse($reservation->reservation_created)->isoFormat('M/D/YY HH:mm a') }}</td>
                                </tr>
            
                                <tr>
                                    <td class="row-header">Category:</td>
                                    <td>{{ $reservation->car()->first()->category()->first()->category_name }}</td>
                                </tr>
            
                                <tr>
                                    <td class="row-header">Car Model:</td>
                                    <td><a href="/cars/{{$reservation->car()->first()->id}}">{{ $reservation->car()->first()->model }}</a></td>
                                </tr>
                                    
                                <tr>
                                    <td class="row-header">Car Rate:</td>
                                    <td>
                                        &#8369;{{ $reservation->car()->first()->rates }}/day
            
                                        @if($reservation->withdriver == 1)
                                            <span>w/ Driver (additional &#8369; 2,000/day)</span>
                                        @endif
                                    </td>
                                </tr>
            
                                <tr>
                                    <td class="row-header">Pickup Time:</td>
                                    <td>{{ Carbon\Carbon::parse($reservation->pickup_time)->isoFormat('h:mm a') }}</td>
                                </tr>
            
                                <tr>
                                    <td class="row-header">Pickup Date:</td>
                                    <td>{{  Carbon\Carbon::parse($reservation->pickup_date)->isoFormat('M/D/YY') }}</td>
                                </tr>
            
                                <tr>
                                    <td class="row-header">Return Date:</td>
                                    <td>{{ Carbon\Carbon::parse($reservation->return_date)->isoFormat('M/D/YY') }}</td>
                                </tr>
            
                                <tr>
                                    <td class="row-header">Rent Days:</td>
                                    <td>{{ $reservation->rent_days}}days</td>
                                </tr>
            
                                <tr>
                                    <td class="row-header">Total Price:</td>
                                    <td>&#8369;{{ number_format($reservation->total_price) }}</td>
                                </tr>
            
                                <tr>
                                    <td class="row-header">Payment Mode:</td>
                                    <td>{{ $reservation->payment_mode()->first()->payment_mode_name }}</td>
                                </tr>
            
                                <tr>
                                    <td class="row-header">Status:</td> 
                                    <td>{{ $reservation->status()->first()->status_name }}</td>
                                </tr>
            
            
                            </table>

                            <div class="col button-container">
                                @if($reservation->status_id == 1)
                                <a href="/profile/reservation/{{$reservation->id}}/cancel"><button class="btn-block cancel">Cancel Reservation</button></a>
                                @endif
                            </div>
            
                            
                        </div>
                    </div>

                   
                
            </div>

     
    </div>
</div>


@endsection