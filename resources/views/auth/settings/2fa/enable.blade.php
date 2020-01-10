@extends('tabler::layouts.main')
@section('title', 'UpCheck')
@section('content')
    <div class="row row-cards">
        @include('auth.settings.partials.menu')
        <div class="col-lg-9">
            @include('flash::message')
            <div class="card">
                <div class="card-status bg-purple"></div>
                <div class="card-header">
                    <h3 class="card-title">
                        Setup two-factor authentication
                    </h3>
                </div>
                <div class="card-body">
                    <div class="alert alert-icon alert-info alert-dismissible" role="alert">
                        <button data-dismiss="alert" class="close"></button>
                        <i class="fe fe-info mr-2" aria-hidden="true"></i>
                        Two-Factor authentication has been enabled successfully.
                    </div>
                    <div class="alert alert-icon alert-warning" role="alert">
                        <i class="fe fe-alert-triangle mr-2" aria-hidden="true"></i>
                        Please don't leave this page before finishing the two-factor authentication process, or you may be unable to access your account in the future.
                    </div>
                    <div class="text-wrap">
                        <h4>Scan the QR code below with your two-factor authentication app.</h4>
                        <img alt="Image of QR barcode" src="{{ $image }}"/>
                    </div>
                    <br>
                    <div class="text-wrap">
                        If your two-factor authentication app does not support QR codes,
                        enter in the following code: <code>{{ $secret }}</code>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <div class="d-flex">
                        <a href="{{ route('2fa.disable') }}" onclick="return confirm('Are you sure that you want to disable two-factor authentication?')" class="btn btn-link">Undo</a>
                        <a href="{{ route('settings.mfa') }}" onclick="return  confirm('Are you sure that you want to finish this setup?')" class="btn btn-primary ml-auto">Finish</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
