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
                @if(session()->get('error'))
                    <div class="alert alert-icon alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert"></button>
                        <i class="fe fe-alert-triangle mr-2" aria-hidden="true"></i>
                        <strong>Oh no! Something went wrong..</strong>
                        <p>{{ session()->get('error') }}</p>
                    </div>
                @endif
                <form class="card" method="post" action="{{ route('settings.password.update') }}">
                    <div class="card-header">
                        <h3 class="card-title">
                            Change Password
                        </h3>
                    </div>
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Current password</label>
                                    <input type="password" class="form-control" name="current" id="current" required
                                           aria-describedby="currentPasswordHelpBlock">

                                    <small id="currentPasswordHelpBlock" class="form-text text-muted">
                                        You must provide your current password in order to change it.
                                    </small>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">New password</label>
                                    <input type="password" class="form-control" name="password" id="password" required>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Confirm new password</label>
                                    <input type="password" class="form-control" name="password_confirmation"
                                           id="password_confirmation" required>
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
