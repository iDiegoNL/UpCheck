@extends('tabler::layouts.main')
@section('title', 'Tabler')
@section('content')
    @if(Auth::id() == 1)
        <div class="row row-cards">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-status bg-purple"></div>
                    <div class="card-header">
                        <h3 class="card-title">
                            Horizon
                            <span class="tag tag-purple">
                                Admin
                                <span class="tag-addon">
                                    <i class="far fa-crown"></i>
                                </span>
                            </span>
                        </h3>
                        <div class="card-options">
                            <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i
                                        class="fe fe-chevron-up"></i></a>
                            <a href="#" class="card-options-fullscreen" data-toggle="card-fullscreen"><i
                                        class="fe fe-maximize"></i></a>
                            <a href="#" class="card-options-remove" data-toggle="card-remove"><i
                                        class="fe fe-x"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="embed-responsive embed-responsive-16by9" style="overflow:hidden;">
                            <iframe class="embed-responsive-item" src="https://upcheck.co/horizon"></iframe>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-status bg-purple"></div>
                    <div class="card-header">
                        <h3 class="card-title">
                            System Load
                            <span class="tag">DE-01</span>
                            <span class="tag tag-purple">
                                Admin
                                <span class="tag-addon">
                                    <i class="far fa-crown"></i>
                                </span>
                            </span>
                        </h3>
                        <div class="card-options">
                            <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i
                                        class="fe fe-chevron-up"></i></a>
                            <a href="#" class="card-options-fullscreen" data-toggle="card-fullscreen"><i
                                        class="fe fe-maximize"></i></a>
                            <a href="#" class="card-options-remove" data-toggle="card-remove"><i
                                        class="fe fe-x"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="https://app.datadoghq.com/graph/embed?token=91c7badf2ff086637ae1bba2d3b1ad1f9766ca3b8ee93ef3bee11442b0b91279&height=300&width=600&legend=true" frameborder="0"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@stop
