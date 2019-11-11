@extends('layouts.auth')
@section('content')
    <div class="img-holder">
        <div class="bg"></div>
        <div class="info-holder">
            <img src="{{ asset('images/graphics/verify.png') }}" alt="">
        </div>
    </div>
    <div class="form-holder">
        <div class="form-content">
            <div class="form-items">
                <h3>Two-Factor Authentication</h3>
                <p>Please enter the code generated on your device below.</p>
                <form class="form-horizontal" role="form" method="POST" action="{{ route('2fa.validate') }}">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control{{ $errors->has('totp') ? ' is-invalid' : '' }}" name="totp" placeholder="123456" pattern="\d*" minlength="6" maxlength="6" required autofocus autocomplete="off" spellcheck="false" title="The code may only contain numbers.">
                        @if ($errors->has('totp'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('totp') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-button">
                        <button id="submit" type="submit" class="ibtn">Verify</button>
                    </div>
                </form>
                <div class="other-links">
                    <span><a href="#">Having trouble?</a></span>
                </div>
                @include('auth.partials.ouch')
            </div>
        </div>
    </div>
@endsection

