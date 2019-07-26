@extends('tabler::layouts.main')
@section('title', 'UpCheck')
@section('content')
    <div class="row row-cards">
        @include('auth.settings.partials.menu')
        <div class="col-lg-9">
            <div class="col-12">
                @if ($errors->any())
                    <div class="alert alert-icon alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert"></button>
                        <i class="fe fe-alert-triangle mr-2" aria-hidden="true"></i>
                        <strong>Oh no! Something went wrong..</strong>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class="card" method="post" action="{{ route('settings.profile.update') }}">
                    <div class="card-header">
                        <h3 class="card-title">
                            Profile
                        </h3>
                    </div>
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Name"
                                           value="{{ Auth::user()->name }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                           placeholder="UpCheck.co" value="{{ Auth::user()->email }}" required>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Phone Number</label>
                                    <input type="text" class="form-control" name="phone" id="phone" placeholder="+31 12345678"
                                           aria-describedby="phoneHelpBlock"
                                           pattern="^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$"
                                           value="{{ Auth::user()->phone }}">
                                    <small id="phoneHelpBlock" class="form-text text-muted">
                                        With country code (e.g. +31)
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary ml-auto">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
