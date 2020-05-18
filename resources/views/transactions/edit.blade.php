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

            <div class="col-md-6 offset-3">

                <p class="">Car Model: {{ $car->model }}</p>
                <p class="">Car Description: {{ $car->description }}</p>
                <p class="">Car Transmission: {{ $car->transmission }}</p>
                <p class="">Car Rates: &#8369; {{ number_format($car->rates) }}/day</p>

                <form action="/transactions/{{ $reservation->id }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="car_id" value="{{ $car->id }}">
                    <!-- for getting the rental rate-->
                    <input type="hidden" name="rates" value="{{ $car->rates }}">

                    {{-- <div>
                        <label for="car_id">Car Model:</label>
                        <select name="car_id" id="car_id">
                            @foreach ($cars as $car)
                            <option value="{{ $car->id }}">{{ $car->model . " "}}&#8369;{{$car->rates."/day"}}</option>
                            @endforeach
                        </select>
                    </div> --}}

                    <div class="form-check">
                        <input class="form-check-input" id="withriver" name="withdriver" value="2000" type="checkbox">
                        <label class="form-check-label" for="withdriver">with Driver (additional &#8369; 2,000/day)</label>
                    </div>

                    
                    <div>
                        <label for="pickup_time">Pickup Time:</label>
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
                    </div>
                    
                    <div>
                        @error('pickup_date')
                        {{ $message }}
                        @enderror
                        <label for="pickup_date">Pickup Date:</label>
                        <input type="date" id="pickup_date" name="pickup_date" value="{{ $reservation->pickup_date }}" required>
                    </div>
                    
                    <div>
                        @error('return_date')
                        {{ $message }}
                        @enderror
                        <label for="return_date">Return Date:</label>
                        <input type="date" id="return_date" name="return_date" value="{{ $reservation->return_date }}" required>
                    </div>
                    
                    <div>
                        <label for="payment_mode_id">Payment Mode: </label>
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
                    </div>

                    <div>
                        <label for="status_id">Status: </label>
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
                    </div>

                    <button type="submit">Update</button>
                    
                </form>

            </div>
        </div>
    </div>

@endsection