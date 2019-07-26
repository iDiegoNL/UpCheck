@extends('layouts.auth')
@section('content')
    <div class="img-holder">
        <div class="bg"></div>
        <div class="info-holder">
            <img src="{{ asset('images/graphics/security.png') }}" alt="">
        </div>
    </div>
    <div class="form-holder">
        <div class="form-content">
            <div class="form-items">
                <h3>Password Reset</h3>
                <p>To reset your password, enter the email address you use to sign in to UpCheck</p>
                <form method="POST" action="{{ route('password.email') }}">
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

                    <div class="form-button">
                        <button id="submit" type="submit" class="ibtn">Send Password Reset Link</button>
                    </div>
                </form>
                <div class="other-links">
                    <span><a href="{{ route('login') }}">Back to login</a></span>
                </div>
                @include('auth.partials.ouch')
            </div>
        </div>
    </div>
@endsection
