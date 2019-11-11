<!doctype html>
<html lang="{{ app()->getLocale() }}" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ isset($title) ? $title . ' | ' . config('tabler.suffix') : config('tabler.suffix') }}</title>
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicons/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('favicons/safari-pinned-tab.svg') }}" color="#5bbad5">
    <link rel="shortcut icon" href="{{ asset('favicons/favicon.ico') }}">
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="msapplication-TileImage" content="{{ asset('favicons/mstile-144x144.png') }}">
    <meta name="msapplication-config" content="{{ asset('browserconfig.xml') }}">
    <meta name="theme-color" content="#ffffff">
    <meta name="Description" content="UpCheck Monitor Dashboard">
    @include('googletagmanager::head')
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">
    @stack('styles')
</head>
<body>
@include('googletagmanager::body')
<div class="page">
    <div class="page-main">
        <div class="header py-4">
            <div class="container">
                <div class="d-flex">
                    <a class="header-brand" href="{!! url(config('tabler.urls.homepage', '/')) !!}">
                        <img src="{{ asset('images/logos/text-logo-2.png') }}" class="header-brand-img" alt="Logo">
                    </a>
                    <div class="d-flex order-lg-2 ml-auto">
                        <div class="dropdown d-none d-md-flex">
                            <a class="nav-link icon" data-toggle="dropdown" aria-expanded="false">
                                <i class="fe fe-bell"></i>
                                <span class="nav-unread"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow" x-placement="bottom-end" style="position: absolute; transform: translate3d(39px, 32px, 0px); top: 0px; left: 0px; will-change: transform;">
                                <a href="#" class="dropdown-item d-flex">
                                    <span class="avatar mr-3 align-self-center" style="background-image: url(demo/faces/male/41.jpg)"></span>
                                    <div>
                                        <strong>Nathan</strong> pushed new commit: Fix page load performance issue.
                                        <div class="small text-muted">10 minutes ago</div>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item d-flex">
                                    <span class="avatar mr-3 align-self-center" style="background-image: url(demo/faces/female/1.jpg)"></span>
                                    <div>
                                        <strong>Alice</strong> started new task: Tabler UI design.
                                        <div class="small text-muted">1 hour ago</div>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item d-flex">
                                    <span class="avatar mr-3 align-self-center" style="background-image: url(demo/faces/female/18.jpg)"></span>
                                    <div>
                                        <strong>Rose</strong> deployed new version of NodeJS REST Api V3
                                        <div class="small text-muted">2 hours ago</div>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item text-center">Mark all as read</a>
                            </div>
                        </div>
                        <div class="dropdown">
                            @if(Auth::check())
                                @include('tabler::_partials.user')
                            @endif
                        </div>
                    </div>
                    <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse"
                       data-target="#headerMenuCollapse">
                        <span class="header-toggler-icon"></span>
                    </a>
                </div>
            </div>
        </div>
        <div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
            <div class="container">
                <div class="row align-items-center">
                    @if(config('tabler.support.search'))
                        <div class="col-lg-3 ml-auto">
                            <form class="input-icon my-3 my-lg-0" action="{!! config('tabler.urls.searchUrl') !!}"
                                  method="GET">
                                <input type="search" class="form-control header-search" placeholder="Search monitors"
                                       tabindex="0" name="keywords" autocomplete="off" aria-label="Search Monitors">
                                <div class="input-icon-addon">
                                    <i class="fe fe-search"></i>
                                </div>
                            </form>
                        </div>
                    @endif
                    <div class="col-lg order-lg-first">
                        @if(Menu::exists('primary'))
                            @include('tabler::_partials.primary-menu')
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="my-3 my-md-5">
            <div class="container">
                <div class="page-header">
                    <h1 class="page-title">
                        {{ isset($title) ? $title : '' }}
                    </h1>
                </div>

                @yield('content')
            </div>
        </div>
    </div>
    @if(config('tabler.support.footer-menu'))
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            @if(Menu::exists('footer'))
                                @include('tabler::_partials.footer-menu')
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <footer class="footer">
        <div class="container">
            <div class="row align-items-center flex-row-reverse">
                <div class="col-12 col-lg-auto mt-3 mt-lg-0 text-center">
                    {!! config('tabler.footer') !!}
                </div>
            </div>
        </div>
    </footer>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="{{ asset('admin/assets/js/vendors/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/darkmode-js.min.js') }}"></script>
<script src="{{ asset('js/tabler.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/7.1.3/highcharts.js" integrity="sha256-yinVd0TWZrMJFUYrcpLqztsSiZVVQXHsKbvp9c7WgH8=" crossorigin="anonymous"></script>
@stack('scripts')
<script>
    const darkmode = new Darkmode;
</script>
</body>
</html>
