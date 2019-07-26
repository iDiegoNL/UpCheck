@extends('tabler::layouts.main')
@section('title', 'UpCheck')
@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pretty-checkbox/3.0.0/pretty-checkbox.min.css" integrity="sha256-KCHcsGm2E36dSODOtMCcBadNAbEUW5m+1xLId7xgLmw=" crossorigin="anonymous" />
@endpush
@section('content')
    <div class="row row-cards">
        @include('monitors.partials.menu')
        <div class="col-lg-9">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Alerts</h3>
                </div>
                <div class="card-body">
                    <div class="alert alert-icon alert-primary" role="alert">
                        <i class="fe fe-bell mr-2" aria-hidden="true"></i> Please note that SMS alerts are only available with the Extended plan.
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <div class="form-label">Email</div>
                                <div class="pretty p-default p-curve p-toggle">
                                    <input type="checkbox" />
                                    <div class="state p-danger p-off">
                                        <label>Disabled</label>
                                    </div>
                                    <div class="state p-success p-on">
                                        <label>Enabled</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <div class="form-label">SMS</div>
                                <div class="pretty p-default p-curve p-toggle">
                                    <input type="checkbox" disabled />
                                    <div class="state p-danger p-off">
                                        <label>Disabled</label>
                                    </div>
                                    <div class="state p-success p-on">
                                        <label>Enabled</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <div class="form-label">PushBullet</div>
                                <div class="pretty p-default p-curve p-toggle">
                                    <input type="checkbox" />
                                    <div class="state p-danger p-off">
                                        <label>Disabled</label>
                                    </div>
                                    <div class="state p-success p-on">
                                        <label>Enabled</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <div class="form-label">Discord</div>
                                <div class="pretty p-default p-curve p-toggle">
                                    <input type="checkbox" />
                                    <div class="state p-danger p-off">
                                        <label>Disabled</label>
                                    </div>
                                    <div class="state p-success p-on">
                                        <label>Enabled</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <div class="form-label">Facebook Messenger</div>
                                <div class="pretty p-default p-curve p-toggle">
                                    <input type="checkbox" />
                                    <div class="state p-danger p-off">
                                        <label>Disabled</label>
                                    </div>
                                    <div class="state p-success p-on">
                                        <label>Enabled</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <div class="form-label">Twitter</div>
                                <div class="pretty p-default p-curve p-toggle">
                                    <input type="checkbox" />
                                    <div class="state p-danger p-off">
                                        <label>Disabled</label>
                                    </div>
                                    <div class="state p-success p-on">
                                        <label>Enabled</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <div class="form-label">Telegram</div>
                                <div class="pretty p-default p-curve p-toggle">
                                    <input type="checkbox" />
                                    <div class="state p-danger p-off">
                                        <label>Disabled</label>
                                    </div>
                                    <div class="state p-success p-on">
                                        <label>Enabled</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <div class="form-label">Slack</div>
                                <div class="pretty p-default p-curve p-toggle">
                                    <input type="checkbox" />
                                    <div class="state p-danger p-off">
                                        <label>Disabled</label>
                                    </div>
                                    <div class="state p-success p-on">
                                        <label>Enabled</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <div class="form-label">Webhooks</div>
                                <div class="pretty p-default p-curve p-toggle">
                                    <input type="checkbox" />
                                    <div class="state p-danger p-off">
                                        <label>Disabled</label>
                                    </div>
                                    <div class="state p-success p-on">
                                        <label>Enabled</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
