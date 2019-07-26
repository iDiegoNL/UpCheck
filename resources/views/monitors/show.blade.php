@extends('tabler::layouts.main')
@section('title', 'UpCheck')
@push('scripts')
    <script src="{{ asset('admin/assets/plugins/charts-c3/plugin.js') }}"></script>
    <script type="text/javascript">
        require(['c3', 'jquery'], function (c3, $) {
            $(document).ready(function () {
                var chart = c3.generate({
                    bindto: '#chart-employment',
                    data: {
                        ...
                    }
                });
            });
        });
    </script>
@endpush
@push('styles')
    <link href="{{ asset('admin/assets/plugins/charts-c3/plugin.css') }}" rel="stylesheet"/>
@endpush
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
                    <h3 class="card-title">Response Times</h3>
                    <div class="card-options">
                        <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i
                                    class="fe fe-chevron-up"></i></a>
                        <a href="#" class="card-options-fullscreen" data-toggle="card-fullscreen"><i
                                    class="fe fe-maximize"></i></a>
                        <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div id="chart-employment" style="height: 16rem"></div>
                </div>
            </div>
        </div>

        @include('monitors.partials.info')
    </div>
@stop
