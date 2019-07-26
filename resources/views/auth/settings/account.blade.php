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
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Account</h3>
                </div>
                <div class="card-body">
                    <div class="text-wrap">
                        <h3>Export account data</h3>
                        <hr class="mt-0">
                        <p>
                            Export all monitors, ping reports and all available account data.
                            These exports will be available for 7 days and will be sent to you per email.
                        </p>
                        <form method="post" action="{{ route('settings.account.export') }}">
                            @csrf
                            <button type="submit" class="btn btn-primary">Start export</button>
                        </form>
                    </div>
                    <br>
                    <div class="text-wrap">
                        <h3>Delete account</h3>
                        <hr class="mt-0">
                        <p>
                            Are you sure you want to permanently delete your account?
                        </p>
                        <p>
                            If you want to change your email or name, you can do this in your
                            <a href="{{ route('settings.profile') }}">profile settings</a>.
                            <br>
                            Once you delete your account, there will be no going back. Please be certain.
                        </p>
                        <form method="post" action="{{ route('settings.account.delete') }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Are you sure that you want to delete your account? This will immediately log you out of your account and you will not be able to log back in.')">
                                <i class="far fa-exclamation-triangle fa-fw"></i>
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
