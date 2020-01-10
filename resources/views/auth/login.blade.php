@extends('layouts.auth')
@section('content')
    <div class="img-holder">
        <div class="bg"></div>
        <div class="info-holder">
            <img src="https://res.cloudinary.com/upcheck/image/upload/v1577379993/graphics/sign-in_a8v6gp.png" alt="Login">
        </div>
    </div>
    <div class="form-holder">
        <div class="form-content">
            <div class="form-items">
                <h3>UpCheck.co</h3>
                <p>Simple and reliable uptime monitoring.</p>
                <div class="page-links">
                    <a href="#" class="active">Login</a>
                    <a href="{{ route('register') }}">Register</a>
                </div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" type="email"
                               name="email" placeholder="E-mail Address" value="{{ old('email') }}" required autofocus>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password"
                               name="password" placeholder="Password" required>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <input type="checkbox" id="remember" name="remember">
                        <label for="remember">Remember me</label>
                    </div>

                    <div class="form-button">
                        <button id="submit" type="submit" class="ibtn">Login</button>
                    </div>
                </form>
                <div class="other-links">
                    <span><a href="{{ route('password.request') }}">Forgot your password?</a></span>
                    <br>
                    <span>Or login&nbsp;&nbsp;with</span>
                    @include('auth.partials.socialite')
                </div>
                @include('auth.partials.ouch')
            </div>
        </div>
    </div>
@endsection
