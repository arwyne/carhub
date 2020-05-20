@extends('layouts.template')

@section('body')

<div class="container-fluid bg-register">
    <div class="col-lg-4 col-md-7 offset-lg-7 offset-md-6">
        
        <div class="register-container">

            <div class="row register-header">
                <h3>Register</h3>
            </div>
        

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="row register-body">

                    <div class="col-md-10 register-form">

                        <div class="form-group">
                            <label for="firstname">First Name:</label>
                            <input type="text" id="firstname" class="form-control  @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required autocomplete="off" autofocus>
                                
                            @error('firstname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="lastname">Last Name:</label>
                            <input type="text" id="lastname" class="form-control  @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="off">    
                            @error('lastname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="off">
                            
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        
                        <div class="form-group">
                            <label for="mobile_no">Mobile No.:</label>
                            <input type="number" id="mobile_no" class="form-control  @error('mobile_no') is-invalid @enderror" name="mobile_no" value="{{ old('mobile_no') }}" required autocomplete="off">
        
                            @error('mobile_no')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" id="username" class="form-control  @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="off">
                    
                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="off">
                    
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="password-confirm">Confirm Password:</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="off">
                        
                        </div>

                        
                        <div class="form-group">
                            <button type="submit" class="btn-block">
                                {{ __('Register') }}
                            </button>

                            <p>Already have an account? <a class="reg-link" href="{{ '/login' }}">Log In</a></p>
                        </div>


                    </div>
                </div>



            </form>

             
        </div>
    </div>
</div>
@endsection



