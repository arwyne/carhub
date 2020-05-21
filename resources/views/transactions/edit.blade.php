@extends('layouts.template')

@section('title', 'CarHub')

@section('body')


<div class="container-fluid bg-trans-edit">
    <div class="col-lg-6 offset-lg-1">



        <div class="trans-edit-container">
            <div class="row trans-edit-header">
                <h3>Transaction Update</h3>
            </div>
            

            
        
                <div class="row trans-edit-body">
    
                    <div class="col-md-5 trans-image">
                        <div class="image-container">
                            <img class="img-fluid" src="{{ asset($car->image) }}" alt="Card image cap">
                        </div>
                        <h3 class="text-center">
                            <a href="/cars/{{$reservation->car()->first()->id}}">{{ $reservation->car()->first()->model }}</a>
                        </h3>
                    </div>
                        
                    <div class="col-md-7 trans-form">
                    
                        <form action="/transactions/{{ $reservation->id }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="car_id" value="{{ $car->id }}">
                           
                            <input type="hidden" name="rates" value="{{ $car->rates }}">
                            <table class="table">
    
                                <tr>
                                    <td class="row-header">Car Model:</td>
                                    <td>{{ $car->model }}</td>
                                </tr>
    
                                <tr>
                                    <td>Car Description:</td>
                                    <td>{{ $car->description }}</td>
                                </tr>
    
                                <tr>
                                    <td>Car Transmission:</td>
                                    <td>{{ $car->transmission }}</td>
                                </tr>
    
                                <tr>
                                    <td>Car Rates:</td>
                                    <td>&#8369; {{ number_format($car->rates) }}/day
                                        <div class="form-check">
                                            <input type="hidden" name="withdriver" value="0">
                                            <input class="form-check-input" id="withriver" name="withdriver" value="2000" type="checkbox">
                                            <label class="form-check-label" for="withdriver">with Driver (additional &#8369; 2,000/day)</label>
                                        </div>
                                    </td>
                                </tr>
    
                                <tr>
                                    <td>
                                        <label for="pickup_time">Pickup Time:</label>
                                    </td>
                                    <td>
                                        <select id="pickup_time" name="pickup_time" required>
                                            <option value="" disabled>Please Select Time</option>
                                            <option value="8:00:00">8:00 AM</option>
                                            <option value="9:00:00">9:00 AM</option>
                                            <option value="10:00:00">10:00 AM</option>
                                            <option value="11:00:00">11:00 AM</option>
                                            <option value="12:00:00">12:00 PM</option>
                                            <option value="13:00:00">1:00 PM</option>
                                            <option value="14:00:00">2:00 PM</option>
                                            <option value="15:00:00">3:00 PM</option>
                                            <option value="16:00:00">4:00 PM</option>
                                            <option value="17:00:00">5:00 PM</option>
                                        </select>
                                    </td>
                                </tr>
    
                                <tr>
                                    <td>
                                        <label for="pickup_date">Pickup Date:</label>
                                    </td>
                                    <td>
                                        <input type="date" id="pickup_date" name="pickup_date" class="form-control @error('pickup_date') is-invalid @enderror" value="{{ $reservation->pickup_date }}" required>
                                        @error('pickup_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </td>
                                </tr>
    
                                <tr>
                                    <td><label for="return_date">Return Date:</label></td>
                                    <td>
                                        <input type="date" id="return_date" class="form-control @error('return_date') is-invalid @enderror"" name="return_date" value="{{ $reservation->return_date }}" required>
                                        @error('return_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </td>
                                </tr>
    
                                <tr>
                                    <td><label for="payment_mode_id">Payment Mode: </label></td>
                                    <td>
                                        <select id="payment_mode_id" name="payment_mode_id" required>
                                            <option value="" disabled>Please Select Payment Mode:</option>
                                            @foreach($payment_modes as $payment_mode)
                                                @if($reservation->payment_mode_id == $payment_mode->id)
                                                    <option value="{{ $payment_mode->id }}" selected>{{ $payment_mode->payment_mode_name }}</option>
                                                @else
                                                    <option value="{{ $payment_mode->id }}">{{ $payment_mode->payment_mode_name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
    
                                <tr>
                                    <td><label for="status_id">Status: </label></td>
                                    <td>
                                        <select name="status_id" id="status_id" required>
                                            <option value="" disabled>Please Select Status:</option>
                                            @foreach($statuses as $status)
                                                @if($reservation->status_id == $status->id)
                                                    <option value="{{ $status->id }}" selected>{{ $status->status_name }}</option>
                                                @else
                                                    <option value="{{ $status->id }}">{{ $status->status_name }}</option>
                                                @endif
                                            @endforeach    
                                        </select>
                                    </td>
                                </tr>
    
                                <tr>
                                    <td></td>
                                    <td>
                                        <div class="button-container">
                                            <button class="btn-block" type="submit">Update</button>
                                        </div>
                                    </td>
                                </tr>
    
                            </table>
    
                        </form>
                        
                    </div>
                </div>

            
        </div>

     
    </div>
</div>
    


@endsection



