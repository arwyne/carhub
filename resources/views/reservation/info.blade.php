@extends('layouts.template')

@section('title', 'CarHub')

@section('body')
    
    
<div class="container-fluid bg-reserve-info">
    <div class="col-lg-3 offset-lg-7 col-md-6 offset-md-6">
    
        <div class="reserve-info-container">
            <div class="row reserve-info-header">
                <h3>Reservation Confirmation</h3>
            </div>
        
                <div class="row reserve-info-body">
   
                    <div class="col reserve-info">
                        <table class="table">
                            <tr>
                                <td class="label">Car Model:</td>
                                <td>{{ $car->model }}</td>
                            </tr>

                            <tr>
                                <td class="label">Category:</td>
                                <td>{{ $car->category()->first()->category_name }}</td>
                            </tr>

                            <tr>
                                <td class="label">Car Description:</td>
                                <td>{{ $car->description }}</td>
                            </tr>


                            <tr>
                                <td class="label">Transmission:</td>
                                <td>{{ $car->transmission }}</td>
                            </tr>

                            <tr>
                               <td class="label">Pickup Time:</td>
                               <td>{{ $pickup_time }}</td>
                            </tr>
                            <tr>
                                <td class="label">Pickup Date:</td>
                                <td>{{ $pickup_date }}</td>
                            </tr>

                            <tr>
                                <td class="label">Return Date:</td>
                                <td>{{ $return_date }}</td>
                            </tr>

                            <tr>
                                <td class="label">Rent Days:</td>
                                <td>{{ $rent_days }}days</td>
                            </tr>

                            <tr>
                                <td class="label">Car Rates:</td>
                                <td>
                                    &#8369;{{ number_format($car->rates) }}/day </p>
                                    @if(isset($withdriver))
                                    <span>{{ $withdriver }} (additional &#8369; 2,000/day)</span>
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <td class="label">Total Price:</td>
                                <td>&#8369;{{ number_format($total_price) }}</td>
                            </tr>

                            <tr>
                                <td class="label">Payment Mode:</td>
                                <td>{{ $payment_mode }}</td>
                            </tr>

                            
                        </table>    
                            
                                
                        <div class="col button-container">
                            <a href="/reservationconfirm"><button class="btn-block confirm">Confirm</button></a>
                            <a href="/reservationclear"><button class="btn-block cancel">Cancel</button></a>

                        </div>
                    </div>
                </div>
            
        </div>

     
    </div>
</div>
    

@endsection

