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
            @include('flash::message')
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Two-Factor Authentication setup</h3>
                </div>
                <div class="card-body">
                    <div class="text-wrap">
                        <p>
                            Open the 2FA application of your choice and scan the following QR code:
                            <br/>
                            <img alt="Image of QR barcode" src="{{ $image }}"/>

                            <br/>
                            If your 2FA application does not support scanning QR codes,
                            enter in the following code: <code>{{ $secret }}</code>
                        </p>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <div class="d-flex">
                        <a href="{{ url('2fa/disable') }}" class="btn btn-gray">Undo this action</a>
                        <a href="{{ route('settings.mfa') }}" class="btn btn-primary ml-auto"
                           onclick="return confirm('Are you sure that you want to leave this setup? Please make sure that you have setup 2FA successfully on your device.')">
                            Finish setup</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

