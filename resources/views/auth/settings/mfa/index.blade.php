@extends('tabler::layouts.main')
@section('title', 'UpCheck')
@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pretty-checkbox/3.0.0/pretty-checkbox.min.css"
          integrity="sha256-KCHcsGm2E36dSODOtMCcBadNAbEUW5m+1xLId7xgLmw=" crossorigin="anonymous"/>
@endpush
@section('content')
    <div class="row row-cards">
        @include('auth.settings.partials.menu')
        <div class="col-lg-9">
            @if(Auth::user()->phone_verified == false)
                <div class="alert alert-icon alert-warning" role="alert">
                    <i class="fal fa-info-circle fa-fw" aria-hidden="true"></i> To enable Two Factor Authentication, you
                    first need to confirm your phone number.
                    <br>
                    <a href="{{ route('phone.index') }}">Confirm your phone number now.</a>
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Two-Factor Authentication</h3>
                </div>
                <div class="card-body">
                    <div class="text-wrap">
                        <p>
                            We strongly recommend using a time-based one-time password (TOTP) application to configure
                            2FA. TOTP applications are more reliable than SMS, especially for locations outside the
                            United States. Some TOTP apps support the secure backup of your authentication codes in the
                            cloud
                            and can be restored if you lose access to your device.
                        </p>
                        <a @if(Auth::user()->phone_verified == false) href="#" @else href="#"
                           @endif class="btn btn-primary @if(Auth::user()->phone_verified == false) disabled @endif">Enable</a>
                    </div>
                    <br>
                    <div class="text-wrap">
                        <h5>Popular TOTP Apps</h5>
                        <hr class="mt-0">
                        <ul>
                            <li>Authy
                                <small>(recommended)</small>
                            </li>
                            <li>Google Authenticator</li>
                            <li>LastPass Authenticator</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
