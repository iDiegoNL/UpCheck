@extends('layouts.auth')
@section('content')
    <div class="img-holder">
        <div class="bg"></div>
        <div class="info-holder">
            <img src="{{ asset('images/graphics/sign-in.png') }}" alt="">
        </div>
    </div>
    <div class="form-holder">
        <div class="form-content">
            <div class="form-items">
                <h3>Two-Factor authentication</h3>
                <p>Enter the code generated by your app below.</p>
                <form method="POST" action="{{ route('2fa.validate') }}">
                    @csrf

                    <div class="form-group">
                        <input class="form-control{{ $errors->has('totp') ? ' is-invalid' : '' }}" type="text"
                               name="totp" placeholder="Code" required autofocus>
                        @if ($errors->has('totp'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('totp') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-button">
                        <button id="submit" type="submit" class="ibtn">Validate</button>
                    </div>
                </form>
                @include('auth.partials.ouch')
            </div>
        </div>
    </div>
@endsection
