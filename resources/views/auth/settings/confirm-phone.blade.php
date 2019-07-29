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
                    <h3 class="card-title">Confirm your phone number</h3>
                </div>
                <div class="card-body">
                    <div class="text-wrap">
                        @if($sent == false)
                            <p>
                                To enable Two Factor Authentication, you first need to confirm your phone number. Please
                                enter your phone number below so we can send you a verification code.
                            </p>
                            <form method="post" action="{{ route('verify.phone.send') }}">
                                @csrf
                                <div class="form-group">
                                    <label class="form-label">Country code and phone number</label>
                                    <div class="row gutters-xs">
                                        <div class="col-1">
                                            <input type="number" class="form-control input-xs" name="country_code"
                                                   id="country_code"
                                                   placeholder="Country code"
                                                   value="{{ \Brick\PhoneNumber\PhoneNumber::parse(Auth::user()->phone)->getCountryCode() }}"
                                                   disabled>
                                        </div>
                                        <div class="col-5">
                                            <input type="number" class="form-control" name="phone" id="phone"
                                                   placeholder="Phone Number"
                                                   value="{{ \Brick\PhoneNumber\PhoneNumber::parse(Auth::user()->phone)->getNationalNumber() }}"
                                                   disabled>
                                        </div>
                                    </div>
                                    <small id="phoneHelpBlock" class="form-text text-muted">
                                        Phone number incorrect? <a href="{{ route('settings.profile') }}">Click here to
                                            change it.</a>
                                    </small>

                                    <div class="row">
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="via">Send via</label>
                                                <select class="form-control" name="via" id="via" required>
                                                    <option value="sms" selected>SMS</option>
                                                    <option value="call">Call</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Send code</button>
                            </form>
                        @else
                            <form method="post" action="{{ route('verify.phone.code') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="code">Verification Code</label>
                                            <input type="text" class="form-control" name="code" id="code" placeholder="1234" spellcheck="false" autocomplete="off" required>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Send code</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
