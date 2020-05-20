@extends('layouts.template')

@section('title', 'CarHub')

@section('body')
    
<div class="container">

    @if(session('message'))
        <div class="alert alert-primary" role="alert">
                {{ session('message') }}
        </div>
    @endif 

    <div class="reservation-add-container">
        <h2 class="text-center">Add Reservation</h2>

        <div class="row align-items-center">
            <div class="col-md-5 offset-1 info-container">
                <div class="image-container">
                    <img class="img-fluid" src="{{ asset($car->image) }}" alt="Card image cap">
                </div>
                <h3 class="text-center">
                    {{ $car->model }}
                </h3>
                
            </div>
            <div class="col-md-5">
                
                <form action="/reservation/{{ $car->id }}/save" method="POST">
                    @csrf
                    <input type="hidden" name="car_id" value="{{ $car->id }}">
                    <!-- for getting the rental rate-->
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
                            @error('pickup_date')
                            {{ $message }}
                            @enderror
                            <td>
                                <label for="pickup_date">Pickup Date:</label>
                            </td>
                            <td><input type="date" id="pickup_date" name="pickup_date" required></td>
                        </tr>

                        <tr>
                            @error('return_date')
                            {{ $message }}
                            @enderror
                            <td><label for="return_date">Return Date:</label></td>
                            <td><input type="date" id="return_date" name="return_date"  required></td>
                        </tr>

                        <tr>
                            <td><label for="payment_mode_id">Payment Mode: </label></td>
                            <td>
                                <select id="payment_mode" name="payment_mode" required>
                                    @foreach($payment_modes as $payment_mode)
                                        <option value="{{ $payment_mode->id }}">{{ $payment_mode->payment_mode_name }}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td></td>
                            <td>
                                <div class="button-container">
                                    <button class="btn btn-primary" type="submit">Update</button>
                                </div>
                            </td>
                        </tr>

                    </table>

                </form>
            
                
            </div>

        </div>
    </div>
</div>

@endsection



