@extends('layouts.template')

@section('body')
<div class="container-fluid bg-login">
    <div class="col-lg-4 col-md-8 offset-lg-2 offset-md-1">
        
        <div class="login-container">

            <div class="row login-header">
                <h3>Login</h3>
            </div>
        


            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="row login-body">

                    <div class="col-md-10 login-form">

                        <div class="form-group">
                            <label for="email" class="">Email:</label>
                            <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        
                        <div class="form-group">
                            <label for="password" class="">Password:</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        
                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>

                        
                        <div class="form-group">
                            <button type="submit" class="btn-block">
                                {{ __('Login') }}
                            </button>

                            <p>Don't have an account? <a href="{{ '/register' }}">Register here</a></p>
        
                            {{-- @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif --}}
                        </div>

                        <hr>
                        <div>
                            <div>
                                <div>Admin Account</div>
                                <div>Username = admin@mail.com</div>
                                <div>Password = admin123</div>
                            </div>
                        </div>


                    </div>

                    
                </div>

            </form>

    

        </div>

    </div>
</div>
@endsection
