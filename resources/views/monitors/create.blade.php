@extends('tabler::layouts.main')
@push('styles')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css"
          integrity="sha256-MeSf8Rmg3b5qLFlijnpxk6l+IJkiR91//YGPCrCmogU=" crossorigin="anonymous"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"
            integrity="sha256-GHC3xFbrevQ0aRcWg5JElUOncXYXxTtMOuA74cWAPTw=" crossorigin="anonymous"></script>
@endpush
@push('scripts')
    <script>
        var domain = document.getElementById("domain");
        domain.oninput = function () {
            document.getElementById("ip").disabled = this.value != "";
            document.getElementById("ip").value = '';
        };

        var ip = document.getElementById("ip");
        ip.oninput = function () {
            document.getElementById("domain").disabled = this.value != "";
            document.getElementById("domain").value = '';
        };
    </script>
@endpush
@section('title', 'UpCheck')
@section('content')
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
        <form class="card" method="post" action="{{ route('monitors.store') }}">
            <div class="card-header">
                <h3 class="card-title">
                    <a href="{{ route('monitors.index') }}"><i class="fal fa-arrow-left fa-fw fa-xs"></i></a>
                    Create new monitor
                </h3>
            </div>
            <div class="alert alert-icon alert-primary alert-disabled" role="alert">
                <button data-dismiss="alert" class="close" aria-label="Dismiss Alert"></button>
                <i class="far fa-info-circle fa-fw fa-xs"></i>
                <strong>Are you using Cloudflare?</strong>
                <br>
                Please add the origin IP of your server instead of the domain name.
                <br>
                Otherwise, downtime might not be monitored correctly.
            </div>
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Server 1"
                                   autofocus>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <script>
                                $(document).ready(function () {
                                    $('.type-select').select2({});
                                });
                            </script>
                            <label class="form-label">Monitoring Type</label>
                            <select class="form-control custom-select type-select" name="monitor_type"
                                    id="monitor_type" disabled>
                                <optgroup label="Network">
                                    <option value="PING" selected>Ping</option>
                                    <option value="TCP">TCP Port</option>
                                    <option value="DNS">DNS</option>
                                    <option value="UDP">UDP Port</option>
                                </optgroup>
                                <optgroup label="Email">
                                    <option value="SMTP">SMTP</option>
                                    <option value="POP3">POP3</option>
                                    <option value="IMAP">IMAP</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <script>
                                $(document).ready(function () {
                                    $('.interval-select').select2({});
                                });
                            </script>
                            <label class="form-label">Interval</label>
                            <select class="form-control custom-select interval-select" name="interval" id="interval"
                                    disabled>
                                <option value="1">1 Minute</option>
                                <option value="5" selected>5 Minutes</option>
                                <option value="15">15 Minutes</option>
                                <option value="30">30 Minutes</option>
                                <option value="30">60 Minutes</option>
                                <option value="1440">1 Day</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Domain Name</label>
                            <input type="text" class="form-control" name="domain" id="domain"
                                   placeholder="UpCheck.co" aria-describedby="domainHelpBlock" spellcheck="false">
                            <small id="domainHelpBlock" class="form-text text-muted">
                                Without http(s)://
                            </small>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Server IP</label>
                            <input type="text" class="form-control" name="ip" id="ip" placeholder="1.1.1.1"
                                   aria-describedby="IPHelpBlock">
                            <small id="IPHelpBlock" class="form-text text-muted" spellcheck="false">
                                IPv4
                            </small>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <script>
                                $(document).ready(function () {
                                    $('.category').select2({});
                                });
                            </script>
                            <label class="form-label">Category</label>
                            <select class="form-control custom-select type-select" name="category"
                                    id="category">
                                <!-- <optgroup label="Computers"> -->
                                <option value="server" selected>Server (default)</option>
                                <option value="database">Database</option>
                                <option value="ethernet">Ethernet</option>
                                <option value="hdd">Storage</option>
                                <option value="print">Printer</option>
                                <option value="envelope">Email</option>
                                <option value="gamepad">Game</option>
                                <!-- </optgroup> -->
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                <div class="d-flex">
                    <a href="{{ route('monitors.index') }}" class="btn btn-link">Cancel</a>
                    <button type="submit" class="btn btn-primary ml-auto">Create Monitor</button>
                </div>
            </div>
        </form>
    </div>
@stop
