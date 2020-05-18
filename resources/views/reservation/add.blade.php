@extends('layouts.template')

@section('title', 'CarHub')

@section('body')
    
    <div class="container">
        <div class="row">
            {{-- @dd($payment_mode) --}}
            <div class="col-md-5 offset-1">
                <div>
                    <img class="img-fluid" src="{{ asset($car->image) }}" alt="Card image cap">
                </div>
            </div>
            <div class="col-md-5">
                <p class="">{{ $car->model }}</p>
                <p class=""> {{ $car->description }}</p>
                <p class=""> {{ $car->transmission }}</p>
                <p class="">&#8369; {{ number_format($car->rates) }}/day</p>

            <form action="/reservation/{{ $car->id }}/save" method="POST">
                @csrf
                <input type="hidden" name="car_id" value="{{ $car->id }}">
                <!-- for getting the rental rate-->
                <input type="hidden" name="rates" value="{{ $car->rates }}">
                
                <div class="form-check">
                    <input class="form-check-input" id="withriver" name="withdriver" value="2000" type="checkbox">
                    <label class="form-check-label" for="withdriver">with Driver (additional &#8369; 2,000/day)</label>
                </div>
                
                <div>
                    <label for="pickup_time">Pickup Time:</label>
                    <select id="pickup_time" name="pickup_time" required>
                        <option value="" selected disabled>Please Select Time</option>
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
                    <input type="date" id="pickup_date" name="pickup_date" required>
                </div>


                <div>
                    @error('return_date')
                        {{ $message }}
                    @enderror
                    <label for="return_date">Return Date:</label>
                    <input type="date" id="return_date" name="return_date" required>
                </div>
                

                <div>
                    <label for="payment_mode">Payment Mode: </label>
                    <select id="payment_mode" name="payment_mode" required>
                        @foreach($payment_modes as $payment_mode)
                            <option value="{{ $payment_mode->id }}">{{ $payment_mode->payment_mode_name }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div>
                    <button id="reserve" class="btn btn-primary" type="submit">Next</button>
                </div>

            </form>

            </div>
            

        </div>

    </div>

@endsection