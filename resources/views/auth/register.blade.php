@extends('layouts.auth')
@section('content')
    <div class="img-holder">
        <div class="bg"></div>
        <div class="info-holder">
            <img src="https://res.cloudinary.com/upcheck/image/upload/v1577379994/graphics/sign-up_cp2wf0.png" alt="Register">
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
                        <input class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}" type="text"
                               name="code" placeholder="Invite Code" required>
                        @if ($errors->has('code'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('code') }}</strong>
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
                    <span>Or register with</span>
                    @include('auth.partials.socialite')
                </div>
                @include('auth.partials.ouch')
            </div>
        </div>
    </div>
@endsection
