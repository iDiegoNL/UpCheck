@extends('layouts.auth')
@section('content')
    <div class="img-holder">
        <div class="bg"></div>
        <div class="info-holder">
            <img src="{{ asset('images/graphics/sign-up.png') }}" alt="">
        </div>
    </div>
    <div class="form-holder">
        <div class="form-content">
            <div class="form-items">
                <h3>UpCheck.co</h3>
                <p>Simple and reliable uptime monitoring.</p>
                <div class="page-links">
                    <a href="{{ route('login') }}">Login</a>
                    <a href="#" class="active">Register</a>
                </div>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group">
                        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" type="text"
                               name="name" placeholder="Name" autofocus required>
                        @if ($errors->has('name'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" type="email"
                               name="email" placeholder="E-mail Address" required>
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
                    <div class="form-button">
                        <button id="submit" type="submit" class="ibtn">Register</button>
                    </div>
                </form>
                <div class="other-links">
                    <span>Or register with</span><a href="#">Google</a><a href="#">Github</a><a href="#">Twitter</a>
                </div>
                @include('auth.partials.ouch')
            </div>
        </div>
    </div>
@endsection
