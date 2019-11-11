@extends('tabler::layouts.main')
@section('title', 'UpCheck')
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
@section('content')
    <div class="row row-cards">
        @include('monitors.partials.menu')

        <div class="col-lg-9">
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
            <form class="card" method="post" action="{{ route('monitors.update', $id) }}">
                <div class="card-header">
                    <h3 class="card-title">Edit Monitor</h3>
                </div>
                @csrf
                @method('PATCH')
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Server 1"
                                       value="{{ $name }}">
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
                                <select class="form-control custom-select interval-select" name="interval" id="interval" disabled>
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
                                       placeholder="UpCheck.co" aria-describedby="domainHelpBlock" spellcheck="false" value="{{ $domain }}">
                                <small id="domainHelpBlock" class="form-text text-muted">
                                    Without http(s)://
                                </small>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Server IP</label>
                                <input type="text" class="form-control" name="ip" id="ip" placeholder="1.1.1.1"
                                       aria-describedby="IPHelpBlock" spellcheck="false" value="{{ $ip }}">
                                <small id="IPHelpBlock" class="form-text text-muted">
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
                        <button type="submit" class="btn btn-primary ml-auto">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
