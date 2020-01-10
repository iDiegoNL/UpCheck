@extends('tabler::layouts.main')
@section('title', 'UpCheck')
@section('content')
    <div class="row row-cards">
        @include('auth.settings.partials.menu')
        <div class="col-lg-9">
            @include('flash::message')
            <div class="card">
                @if (Auth::user()->google2fa_secret)
                    <div class="card-status bg-green"></div>
                @else
                    <div class="card-status bg-red"></div>
                @endif
                <div class="card-header">
                    <h3 class="card-title">
                        Two-Factor Authentication
                        @if (Auth::user()->google2fa_secret)
                            (enabled)
                        @endif
                    </h3>
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
                        @if (Auth::user()->google2fa_secret)
                            <a href="{{ url('2fa/disable') }}" class="btn btn-danger">Disable</a>
                        @else
                            <a href="{{ url('2fa/enable') }}" class="btn btn-primary">Enable</a>
                        @endif
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
