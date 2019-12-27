<!doctype html>
<html lang="{{ app()->getLocale() }}" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ isset($title) ? $title . ' | ' . config('tabler.suffix') : config('tabler.suffix') }}</title>
    <meta name="description" content="UpCheck provides easy to use and reliable monitoring for all your services."/>
    <meta name="robots" content="index, follow"/>
    <meta name="referrer" content="always"/>
    <meta name="copyright" content="UpCheck">

    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="UpCheck | Uptime Monitoring">
    <meta itemprop="description" content="UpCheck provides easy to use and reliable monitoring for all your services.">
    <meta itemprop="image" content="{{ asset('images/logos/1500x1500.png') }}">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@UpCheckCo">
    <meta name="twitter:title" content="UpCheck | Uptime Monitoring">
    <meta name="twitter:description"
          content="UpCheck provides easy to use and reliable monitoring for all your services.">
    <meta name="twitter:creator" content="@author_handle">
    <meta name="twitter:image:src" content="{{ asset('images/logos/1500x1500.png') }}">

    <!-- Open Graph data -->
    <meta property="og:title" content="UpCheck | Uptime Monitoring"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="https://upcheck.co"/>
    <meta property="og:image" content="{{ asset('images/logos/1500x1500.png') }}"/>
    <meta property="og:description"
          content="UpCheck provides easy to use and reliable monitoring for all your services."/>
    <meta property="og:site_name" content="UpCheck"/>
    <meta property="fb:app_id" content="474966809753505"/>
    <meta name="fb:page_id" content="385357925533267"/>
    <meta name="og:email" content="info@upcheck.co"/>

    <meta name="apple-mobile-web-app-title" content="UpCheck">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="white">
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
@include('googletagmanager::head')
<!-- Begin loading animation -->
    <style>
        @keyframes hideLoader {
            0% {
                width: 100%;
                height: 100%;
            }
            100% {
                width: 0;
                height: 0;
            }
        }

        body > div.loader {
            position: fixed;
            background: white;
            width: 100%;
            height: 100%;
            z-index: 1071;
            opacity: 0;
            transition: opacity .5s ease;
            overflow: hidden;
            pointer-events: none;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        body:not(.loaded) > div.loader {
            opacity: 1;
        }

        body:not(.loaded) {
            overflow: hidden;
        }

        body.loaded > div.loader {
            animation: hideLoader .5s linear .5s forwards;
        }

        .loading-animation {
            width: 40px;
            height: 40px;
            margin: 100px auto;
            background-color: #2568ef;
            border-radius: 100%;
            animation: pulse 1s infinite ease-in-out
        }

        @keyframes pulse {
            0% {
                -webkit-transform: scale(0);
                transform: scale(0)
            }
            100% {
                -webkit-transform: scale(1);
                transform: scale(1);
                opacity: 0
            }
        }
    </style>
    <script type="text/javascript">
        window.addEventListener("load", function () {
            document.querySelector('body').classList.add('loaded');
        });
    </script>
    <!-- End loading animation -->
    <link href="{{ asset('home/css/all.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,400i,600,700&display=swap" rel="stylesheet">
</head>
<body>
<div class="loader">
    <div class="loading-animation"></div>
</div>
<div class="navbar-container bg-light">
    @include('partials.navbar')
</div>
@yield('content')

@include('partials.footer')

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

<!-- Typed text (animated typing effect)-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.10/typed.min.js"
        integrity="sha256-F6VRM94CIE3Kv2zkAtbzlViDfZ3HMaIgusIcFBPIjiU=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"
        integrity="sha256-pQBbLkFHcP1cy0C8IhoSdxlm0CtcH5yJ2ki9jjgR03c=" crossorigin="anonymous"></script>
<script>
    AOS.init();
</script>

<script type="text/javascript">
    var prompt = new pwaInstallPrompt();
</script>
</body>
