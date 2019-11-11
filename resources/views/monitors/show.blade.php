@extends('tabler::layouts.main')
@section('title', 'UpCheck')
@section('content')
    <div class="row row-cards">
        @include('monitors.partials.menu')

        <div class="col-lg-9">
            <div class="card">
                <div class="card-header">
                    @if ($status == 'online')
                        <div class="card-status bg-green"></div>
                    @elseif ($status == 'offline')
                        <div class="card-status bg-red"></div>
                    @else
                        <div class="card-status bg-gray"></div>
                    @endif
                    <h3 class="card-title">Response Times ({{ $date }})</h3>
                    <div class="card-options">
                        <a href="#" role="button" class="card-options-history dropdown-toggle" id="historyDropdownMenuButton"
                           aria-haspopup="true" aria-expanded="false" data-toggle="dropdown">
                            <i class="fal fa-history fa-fw"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="historyDropdownMenuButton" style="width: 50px">
                            <a class="dropdown-item" href="#">{{ Carbon\Carbon::today()->toFormattedDateString() }}</a>
                            <a class="dropdown-item" href="#">{{ Carbon\Carbon::today()->subDay()->toFormattedDateString() }}</a>
                            <a class="dropdown-item" href="#">{{ Carbon\Carbon::today()->subDays(2)->toFormattedDateString() }}</a>
                            <a class="dropdown-item" href="#">{{ Carbon\Carbon::today()->subDays(3)->toFormattedDateString() }}</a>
                            <a class="dropdown-item" href="#">{{ Carbon\Carbon::today()->subDays(4)->toFormattedDateString() }}</a>
                            <a class="dropdown-item" href="#">{{ Carbon\Carbon::today()->subDays(5)->toFormattedDateString() }}</a>
                            <a class="dropdown-item" href="#">{{ Carbon\Carbon::today()->subDays(6)->toFormattedDateString() }}</a>
                            <a class="dropdown-item" href="#"><b>More history</b></a>
                        </div>
                        <a href="#" class="card-options-collapse" data-toggle="card-collapse">
                            <i class="fe fe-chevron-up"></i>
                        </a>
                        <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    @if(\App\Ping::where('monitor_id', $id)->where('ms', '>', 0)->count() == 0 && \App\Ping::where('monitor_id', $id)->count() >= 1)
                        <div class="alert alert-icon alert-primary" role="alert">
                            <i class="fe fe-info mr-2" aria-hidden="true"></i>
                            It looks like all ping attempts were unsuccessful.
                            <br>
                            Please make sure that you configured your monitor correctly and the service is reachable,
                            otherwise contact our support.
                        </div>
                        <div class="text-center">
                            <img src="{{ asset('images/graphics/empty.svg') }}" width="350px">
                            <h3>There aren't any successful response times to show</h3>
                        </div>
                    @elseif(\App\Ping::where('monitor_id', $id)->where('ms', '>', 0)->count() == 0 && \App\Ping::where('monitor_id', $id)->count() >= 1 && \App\Monitor::where('user_id', $user_id)->count() > 1)
                        <div class="text-center">
                            <img src="{{ asset('images/graphics/empty.svg') }}" width="350px">
                            <h3>There aren't any successful response times to show</h3>
                        </div>
                    @elseif(\App\Ping::where('monitor_id', $id)->where('ms', '>', 0)->count() == 0 && \App\Ping::where('monitor_id', $id)->count() >= 0 && \App\Monitor::where('user_id', $user_id)->count() == 1)
                        <div class="text-center">
                            <img src="{{ asset('images/graphics/high_five.svg') }}" width="350px">
                            <h3 class="mt-5">Congratulations, you successfully added your first monitor!</h3>
                            <h4 style="font-weight:normal">
                                Your first ping results will show here within 5 minutes.
                                <br>
                                Can't wait?
                            </h4>
                            <a href="#" class="btn btn-purple"><i class="fal fa-rocket"></i> Check now</a>
                        </div>
                    @else
                        {!! $chart->container() !!}
                        {!! $chart->script() !!}
                    @endif
                </div>
            </div>
        </div>

        @include('monitors.partials.info')
    </div>
@stop
