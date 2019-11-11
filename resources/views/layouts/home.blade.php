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
    <nav class="navbar navbar-expand-lg navbar-light" data-sticky="top">
        <div class="container">
            <a class="navbar-brand fade-page" href="index.html">
                <img alt="Jumpstart" src="{{ asset('images/logos/text-logo-2.png') }}" height="30px">
            </a>
            <div class="d-flex align-items-center order-lg-3">
                <a href="{{ route('register') }}"
                   class="btn btn-primary ml-lg-4 mr-3 mr-md-4 mr-lg-0 d-none d-sm-block">Register</a>
                <a href="{{ route('login') }}"
                   class="btn btn-info ml-lg-4 mr-3 mr-md-4 mr-lg-0 d-none d-sm-block">Login</a>
                <button aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"
                        data-target=".navbar-collapse" data-toggle="collapse" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse order-3 order-lg-2 justify-content-lg-end" id="navigation-menu">
                <ul class="navbar-nav my-3 my-lg-0">
                    <li class="nav-item">
                        <div class="dropdown">
                            <a aria-expanded="false" aria-haspopup="true"
                               class="dropdown-toggle nav-link nav-item arrow-bottom" data-toggle="dropdown-grid"
                               href="#" role="button">Demos</a>
                            <div class="row dropdown-menu">
                                <div class="row dropdown-menu">
                                    <div class="col-auto" data-dropdown-content>
                                        <div class="dropdown-grid-menu"><a href="index.html"
                                                                           class="dropdown-item fade-page">Overview</a><a
                                                    href="landing-1.html" class="dropdown-item fade-page">Landing
                                                1</a><a
                                                    href="landing-2.html" class="dropdown-item fade-page">Landing
                                                2</a><a
                                                    href="landing-3.html"
                                                    class="dropdown-item fade-page">Landing 3</a><a
                                                    href="landing-4.html"
                                                    class="dropdown-item fade-page">Landing
                                                4</a><a href="landing-5.html" class="dropdown-item fade-page">Landing
                                                5</a><a href="landing-6.html" class="dropdown-item fade-page">Landing
                                                6</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <a aria-expanded="false" aria-haspopup="true"
                               class="dropdown-toggle nav-link nav-item arrow-bottom" data-toggle="dropdown-grid"
                               href="#" role="button">Pages</a>
                            <div class="row dropdown-menu">
                                <div class="col-auto" data-dropdown-content>
                                    <div class="dropdown-grid-menu">
                                        <div class="dropdown">
                                            <a aria-expanded="false" aria-haspopup="true" class="dropdown-item"
                                               data-toggle="dropdown-grid" href="#" role="button">Company</a>
                                            <div class="row dropdown-menu">
                                                <div class="col-auto" data-dropdown-content>
                                                    <div class="dropdown-grid-menu"><a href="company-about-1.html"
                                                                                       class="dropdown-item fade-page">About
                                                            1</a><a href="company-about-2.html"
                                                                    class="dropdown-item fade-page">About 2</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="dropdown">
                                            <a aria-expanded="false" aria-haspopup="true" class="dropdown-item"
                                               data-toggle="dropdown-grid" href="#" role="button">Blog</a>
                                            <div class="row dropdown-menu">
                                                <div class="col-auto" data-dropdown-content>
                                                    <div class="dropdown-grid-menu"><a href="blog-listing-1.html"
                                                                                       class="dropdown-item fade-page">Blog
                                                            Listing 1</a><a href="blog-listing-2.html"
                                                                            class="dropdown-item fade-page">Blog Listing
                                                            2</a><a href="blog-listing-3.html"
                                                                    class="dropdown-item fade-page">Blog Listing 3</a>
                                                        <a
                                                                href="blog-article.html"
                                                                class="dropdown-item fade-page">Blog Article</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="dropdown">
                                            <a aria-expanded="false" aria-haspopup="true" class="dropdown-item"
                                               data-toggle="dropdown-grid" href="#" role="button">Help Center</a>
                                            <div class="row dropdown-menu">
                                                <div class="col-auto" data-dropdown-content>
                                                    <div class="dropdown-grid-menu"><a href="help-center-home.html"
                                                                                       class="dropdown-item fade-page">Help
                                                            Center Home</a><a href="help-center-category.html"
                                                                              class="dropdown-item fade-page">Help
                                                            Center Category</a><a href="help-center-article.html"
                                                                                  class="dropdown-item fade-page">Help
                                                            Center Article</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="dropdown">
                                            <a aria-expanded="false" aria-haspopup="true" class="dropdown-item"
                                               data-toggle="dropdown-grid" href="#" role="button">Careers</a>
                                            <div class="row dropdown-menu">
                                                <div class="col-auto" data-dropdown-content>
                                                    <div class="dropdown-grid-menu"><a href="careers-1.html"
                                                                                       class="dropdown-item fade-page">Careers
                                                            1</a><a href="careers-2.html"
                                                                    class="dropdown-item fade-page">Careers 2</a><a
                                                                href="career-single.html"
                                                                class="dropdown-item fade-page">Career Single</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="dropdown">
                                            <a aria-expanded="false" aria-haspopup="true" class="dropdown-item"
                                               data-toggle="dropdown-grid" href="#" role="button">Case Studies</a>
                                            <div class="row dropdown-menu">
                                                <div class="col-auto" data-dropdown-content>
                                                    <div class="dropdown-grid-menu"><a href="case-studies.html"
                                                                                       class="dropdown-item fade-page">Case
                                                            Studies</a><a href="case-study-single.html"
                                                                          class="dropdown-item fade-page">Case Study
                                                            Single</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="dropdown">
                                            <a aria-expanded="false" aria-haspopup="true" class="dropdown-item"
                                               data-toggle="dropdown-grid" href="#" role="button">Pricing</a>
                                            <div class="row dropdown-menu">
                                                <div class="col-auto" data-dropdown-content>
                                                    <div class="dropdown-grid-menu"><a href="pricing-plans.html"
                                                                                       class="dropdown-item fade-page">Pricing
                                                            Plans</a><a href="pricing-table.html"
                                                                        class="dropdown-item fade-page">Pricing
                                                            Table</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="dropdown">
                                            <a aria-expanded="false" aria-haspopup="true" class="dropdown-item"
                                               data-toggle="dropdown-grid" href="#" role="button">Contact</a>
                                            <div class="row dropdown-menu">
                                                <div class="col-auto" data-dropdown-content>
                                                    <div class="dropdown-grid-menu"><a href="contact.html"
                                                                                       class="dropdown-item fade-page">Contact</a><a
                                                                href="contact-map.html" class="dropdown-item fade-page">Contact
                                                            Map</a><a href="contact-planner.html"
                                                                      class="dropdown-item fade-page">Contact
                                                            Planner</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="dropdown">
                                            <a aria-expanded="false" aria-haspopup="true" class="dropdown-item"
                                               data-toggle="dropdown-grid" href="#" role="button">Account</a>
                                            <div class="row dropdown-menu">
                                                <div class="col-auto" data-dropdown-content>
                                                    <div class="dropdown-grid-menu"><a href="account-settings.html"
                                                                                       class="dropdown-item fade-page">Account
                                                            Settings</a><a href="account-invoice.html"
                                                                           class="dropdown-item fade-page">Invoice</a><a
                                                                href="account-sign-up-cover.html"
                                                                class="dropdown-item fade-page">Sign Up - Cover</a>
                                                        <a
                                                                href="account-sign-in-cover.html"
                                                                class="dropdown-item fade-page">Sign In - Cover</a><a
                                                                href="account-sign-up-simple.html"
                                                                class="dropdown-item fade-page">Sign Up - Simple</a><a
                                                                href="account-sign-in-simple.html"
                                                                class="dropdown-item fade-page">Sign In - Simple</a><a
                                                                href="account-forgot-password.html"
                                                                class="dropdown-item fade-page">Forgot Password</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="dropdown">
                                            <a aria-expanded="false" aria-haspopup="true" class="dropdown-item"
                                               data-toggle="dropdown-grid" href="#" role="button">Utility</a>
                                            <div class="row dropdown-menu">
                                                <div class="col-auto" data-dropdown-content>
                                                    <div class="dropdown-grid-menu"><a
                                                                href="utility-coming-soon-subscribe.html"
                                                                class="dropdown-item fade-page">Coming Soon
                                                            Subscribe</a><a href="utility-coming-soon-countdown.html"
                                                                            class="dropdown-item fade-page">Coming Soon
                                                            Countdown</a><a href="utility-coming-soon-social.html"
                                                                            class="dropdown-item fade-page">Coming Soon
                                                            Social</a><a href="utility-legal-terms.html"
                                                                         class="dropdown-item fade-page">Legal Terms</a><a
                                                                href="404.html" class="dropdown-item fade-page">404</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <a aria-expanded="false" aria-haspopup="true"
                               class="dropdown-toggle nav-link nav-item arrow-bottom" data-toggle="dropdown-grid"
                               href="#" role="button">Features</a>
                            <div class="row dropdown-menu">
                                <div class="col-auto" data-dropdown-content>
                                    <div class="dropdown-grid-menu"><a href="style-guide.html"
                                                                       class="dropdown-item fade-page">Style Guide</a><a
                                                href="plugins.html" class="dropdown-item fade-page">Plugins</a><a
                                                href="navigation-bars.html" class="dropdown-item fade-page">Navigation
                                            Bars</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <a aria-expanded="false" aria-haspopup="true"
                               class="dropdown-toggle nav-link nav-item arrow-bottom" data-toggle="dropdown-grid"
                               href="#" role="button">Support</a>
                            <div class="row dropdown-menu">
                                <div class="col-auto" data-dropdown-content>
                                    <div class="dropdown-grid-menu"><a href="documentation/index.html"
                                                                       class="dropdown-item" target="_blank">Documentation</a><a
                                                href="documentation/changelog.html" class="dropdown-item"
                                                target="_blank">Changelog</a><a href="https://mediumrare.ticksy.com/"
                                                                                class="dropdown-item"
                                                                                target="_blank">Get Help</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-m-block" href="{{ route('register') }}">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-m-block" href="{{ route('login') }}">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>

<section class="bg-light pb-0 o-hidden">
    <div class="container">
        <div class="row align-items-center justify-content-center justify-content-lg-between text-center text-lg-left">
            <div class="col-md-9 col-lg-6 col-xl-5 mb-4 mb-lg-0 pr-lg-5 pr-xl-0">
                <div data-aos="fade-in" data-aos-delay="250">
                    <h1 class="display-3">
                        <mark data-aos="highlight-text" data-aos-delay="500">Save time</mark>
                        with UpCheck
                    </h1>
                    <p class="lead">
                        UpCheck provides easy to use and reliable monitoring for all your services.
                    </p>
                    <div class="d-flex flex-column flex-sm-row mt-4 mt-md-5 justify-content-center justify-content-lg-start aos-init aos-animate"
                         data-aos="fade-right" data-aos-delay="300">
                        <a href="#" class="btn btn-primary btn-lg mx-sm-2 mx-lg-0 mr-lg-2 my-1 my-sm-0">Explore
                            Features</a>
                        <a href="{{ route('register') }}"
                           class="btn btn-outline-primary btn-lg mx-sm-2 mx-lg-0 mr-lg-2 my-1 my-sm-0">Get Started</a>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-lg-6" data-aos="fade-left">
                <img src="{{ asset('images/graphics/undraw_data_trends_b0wg.svg') }}" alt="Image"
                     class="img-fluid">
            </div>
        </div>
    </div>
</section>
<section class="bg-light pb-0 pt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-auto">
                <ul class="list-unstyled d-flex flex-wrap justify-content-center mb-0">
                    <li class="my-3 mx-3 mx-lg-4">
                        <img src="assets/img/logos/brand/aven.svg" alt="Aven company logo" class="opacity-50"
                             data-inject-svg>
                    </li>
                    <li class="my-3 mx-3 mx-lg-4">
                        <img src="assets/img/logos/brand/asgardia.svg" alt="Asgardia company logo" class="opacity-50"
                             data-inject-svg>
                    </li>
                    <li class="my-3 mx-3 mx-lg-4">
                        <img src="assets/img/logos/brand/kanba.svg" alt="Kanba company logo" class="opacity-50"
                             data-inject-svg>
                    </li>
                    <li class="my-3 mx-3 mx-lg-4">
                        <img src="assets/img/logos/brand/treva.svg" alt="Treva company logo" class="opacity-50"
                             data-inject-svg>
                    </li>
                    <li class="my-3 mx-3 mx-lg-4">
                        <img src="assets/img/logos/brand/ztos.svg" alt="Ztos company logo" class="opacity-50"
                             data-inject-svg>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="divider divider-bottom bg-white mt-5"></div>
</section>
<section class="o-hidden">
    <div class="container">
        <div class="row align-items-center justify-content-around text-center text-lg-left">
            <div class="col-md-9 col-lg-6 col-xl-5 mb-4 mb-md-5 mb-lg-0 pl-lg-5 pl-xl-0">
                <div>
                    <div class="alert bg-secondary rounded-lg d-inline-block mb-4">
                        <div class="d-flex align-items-center">
                            <div class="badge badge-pill badge-success">New</div>
                            <div class="mx-3">WhatsApp Notifications</div>
                        </div>
                    </div>
                    <h3 class="h1">Status notifications</h3>
                    <p class="lead">
                        When your monitored service goes offline or has an issue, you will instantly receive a
                        notification to your enabled notification methods.
                    </p>
                    <a href="#" class="lead">Explore More</a>
                </div>
            </div>
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="{{ asset('images/graphics/undraw_notify_88a4.svg') }}" alt="Image" class="img-fluid">
            </div>
        </div>
    </div>
</section>
<section class="o-hidden p-0">
    <div class="container">
        <div class="row align-items-center justify-content-around text-center text-lg-left">
            <div class="col-md-9 col-lg-6 col-xl-5 mb-4 mb-md-5 mb-lg-0 order-lg-2 pl-lg-5 pl-xl-0">
                <div>
                    <h2 class="h1">Simple and reliable monitoring</h2>
                    <p class="lead">
                        UpCheck provides advanced monitoring methods like SSL and domain
                        expiration checks and more to suit your needs.
                    </p>
                </div>
                <div class="d-flex flex-wrap justify-content-center justify-content-lg-start">
                    <div class="mb-3 mr-4 ml-lg-0 mr-lg-4" data-aos="fade-left" data-aos-delay="100">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-lock fa-fw"></i>
                            <h6 class="mb-0 ml-3">SSL Monitoring</h6>
                        </div>
                    </div>
                    <div class="mb-3 mr-4 ml-lg-0 mr-lg-4" data-aos="fade-left" data-aos-delay="100">
                        <div class="d-flex align-items-center">
                            <i class="far fa-globe fa-fw"></i>
                            <h6 class="mb-0 ml-3">Domain Expiration Monitoring</h6>
                        </div>
                    </div>
                    <div class="mb-3 mr-4 ml-lg-0 mr-lg-4" data-aos="fade-left" data-aos-delay="100">
                        <div class="d-flex align-items-center">
                            <i class="far fa-stopwatch fa-fw"></i>
                            <h6 class="mb-0 ml-3">Uptime Monitoring</h6>
                        </div>
                    </div>
                    <div class="mb-3 mr-4 ml-lg-0 mr-lg-4" data-aos="fade-left" data-aos-delay="100">
                        <div class="d-flex align-items-center">
                            <i class="far fa-link fa-fw"></i>
                            <h6 class="mb-0 ml-3">Broken Link Monitoring</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-lg-6 col-xl-5 order-lg-1">
                <img src="{{ asset('images/graphics/undraw_inspiration_lecl.svg') }}" alt="Image" class="img-fluid">
            </div>
        </div>
    </div>
    <div class="divider divider-bottom bg-light"></div>
</section>
<section class="bg-light">
    <div class="container">
        <div class="row section-title justify-content-center text-center">
            <div class="col-md-9 col-lg-8 col-xl-7">
                <h3 class="display-4">
                    <mark data-aos='highlight-text' data-aos-delay='500'>Do more</mark>
                    with UpCheck
                </h3>
                <div class="lead">
                    UpCheck offers almost all features for free.
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col d-flex flex-wrap justify-content-center">
                <div class="m-2">
                    <div class="media rounded align-items-center pl-3 pr-4 pl-md-4 pr-md-5 py-2 bg-white">
                        <i class="far fa-bolt">&nbsp;&nbsp;</i>
                        <h5 class="mb-0">Instant Notifications</h5>
                    </div>
                </div>
                <div class="m-2">
                    <div class="media rounded align-items-center pl-3 pr-4 pl-md-4 pr-md-5 py-2 bg-white">
                        <i class="far fa-tags">&nbsp;&nbsp;</i>
                        <h5 class="mb-0">Multiple Ping Methods</h5>
                    </div>
                </div>
                <div class="m-2">
                    <div class="media rounded align-items-center pl-3 pr-4 pl-md-4 pr-md-5 py-2 bg-white">
                        <i class="far fa-chart-bar">&nbsp;&nbsp;</i>
                        <h5 class="mb-0">Advanced Statistics</h5>
                    </div>
                </div>
                <div class="m-2">
                    <div class="media rounded align-items-center pl-3 pr-4 pl-md-4 pr-md-5 py-2 bg-white">
                        <i class="far fa-file-certificate fa-fw">&nbsp;&nbsp;</i>
                        <h5 class="mb-0">SSL Monitoring</h5>
                    </div>
                </div>
                <div class="m-2">
                    <div class="media rounded align-items-center pl-3 pr-4 pl-md-4 pr-md-5 py-2 bg-white">
                        <i class="far fa-file-alt fa-fw">&nbsp;&nbsp;</i>
                        <h5 class="mb-0">Public Status Pages</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="o-hidden">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 mb-5 mb-xl-0 aos-init aos-animate" data-aos="fade-right">
                <div class="text-center text-xl-left mb-lg-5">
                    <h3 class="h1">
                        Showcase the
                        <mark data-aos="highlight-text" data-aos-delay="250" class="aos-init aos-animate">great
                            features
                        </mark>
                        of your
                        app
                    </h3>
                </div>
                <ul class="nav nav-pills justify-content-center flex-xl-column pr-xl-5" role="tablist">
                    <li class="nav-item">
                        <a class="btn btn-lg btn-primary w-100 active" id="tab-1" data-toggle="tab" href="#home-6"
                           role="tab" aria-controls="tab-1" aria-selected="true">
                            <div class="d-flex align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                     width="24px" height="24px" viewBox="0 0 24 24" version="1.1"
                                     class="injected-svg icon bg-primary"
                                     data-src="assets/img/icons/theme/design/layers.svg">
                                    <title>Icon For Layers</title>
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon opacity="0" points="0 0 24 0 24 24 0 24"></polygon>
                                        <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z"
                                              fill="#000000" fill-rule="nonzero"></path>
                                        <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z"
                                              fill="#000000" opacity="0.3"></path>
                                    </g>
                                </svg>
                                <span>Adaptable Design</span>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-lg btn-primary w-100" id="tab-2" data-toggle="tab" href="#profile-6"
                           role="tab" aria-controls="tab-2" aria-selected="false">
                            <div class="d-flex align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                     width="24px" height="24px" viewBox="0 0 24 24" version="1.1"
                                     class="injected-svg icon bg-primary"
                                     data-src="assets/img/icons/theme/devices/display-1.svg">
                                    <title>Icon For Display#1</title>
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect opacity="0" x="0" y="0" width="24" height="24"></rect>
                                        <path d="M11,20 L11,17 C11,16.4477153 11.4477153,16 12,16 C12.5522847,16 13,16.4477153 13,17 L13,20 L15.5,20 C15.7761424,20 16,20.2238576 16,20.5 C16,20.7761424 15.7761424,21 15.5,21 L8.5,21 C8.22385763,21 8,20.7761424 8,20.5 C8,20.2238576 8.22385763,20 8.5,20 L11,20 Z"
                                              fill="#000000" opacity="0.3"></path>
                                        <path d="M3,5 L21,5 C21.5522847,5 22,5.44771525 22,6 L22,16 C22,16.5522847 21.5522847,17 21,17 L3,17 C2.44771525,17 2,16.5522847 2,16 L2,6 C2,5.44771525 2.44771525,5 3,5 Z M4.5,8 C4.22385763,8 4,8.22385763 4,8.5 C4,8.77614237 4.22385763,9 4.5,9 L13.5,9 C13.7761424,9 14,8.77614237 14,8.5 C14,8.22385763 13.7761424,8 13.5,8 L4.5,8 Z M4.5,10 C4.22385763,10 4,10.2238576 4,10.5 C4,10.7761424 4.22385763,11 4.5,11 L7.5,11 C7.77614237,11 8,10.7761424 8,10.5 C8,10.2238576 7.77614237,10 7.5,10 L4.5,10 Z"
                                              fill="#000000"></path>
                                    </g>
                                </svg>
                                <span>Clean Code</span>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-lg btn-primary w-100" id="tab-3" data-toggle="tab" href="#contact-6"
                           role="tab" aria-controls="tab-3" aria-selected="false">
                            <div class="d-flex align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                     width="24px" height="24px" viewBox="0 0 24 24" version="1.1"
                                     class="injected-svg icon bg-primary"
                                     data-src="assets/img/icons/theme/general/folder.svg">
                                    <title>Icon For Folder</title>
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect opacity="0" x="0" y="0" width="24" height="24"></rect>
                                        <path d="M3.5,20 L20.5,20 C21.3284271,20 22,19.3284271 22,18.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L11,7 L8.43933983,4.43933983 C8.15803526,4.15803526 7.77650439,4 7.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,18.5 C2,19.3284271 2.67157288,20 3.5,20 Z"
                                              fill="#000000"></path>
                                    </g>
                                </svg>
                                <span>Well Organized</span>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col aos-init aos-animate" data-aos="fade-left" data-aos-delay="250">
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="home-6" role="tabpanel" aria-labelledby="tab-1">
                        <div class="row justify-content-around align-items-center">
                            <div class="col-8 col-sm-4 col-lg-4 col-xl-5">
                                <img src="assets/img/mobile-app/mobile-app-2.png" alt="Screenshot" class="img-fluid">
                            </div>
                            <div class="col-sm col-md-6 mt-4 mt-sm-0">
                                <h5>Suits your style</h5>
                                <p>
                                    Ned ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                    doloremque laudantium, totam rem aperiam, eaque ipsa.
                                </p>
                                <div class="mt-4">
                                    <div class="media rounded align-items-center pl-3 pr-3 pr-md-4 py-2 d-inline-flex text-left bg-secondary">
                                        <img src="assets/img/avatars/female-4.jpg" alt="Ashley Mance avatar image"
                                             class="avatar avatar-sm flex-shrink-0 mr-3">
                                        <div class="text-dark mb-0">“Jumpstart is a dream come true.”</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile-6" role="tabpanel" aria-labelledby="tab-2">
                        <div class="row justify-content-around align-items-center">
                            <div class="col-8 col-sm-4 col-lg-4 col-xl-5">
                                <img src="assets/img/mobile-app/mobile-app-3.png" alt="Screenshot" class="img-fluid">
                            </div>
                            <div class="col-sm col-md-6 mt-4 mt-sm-0">
                                <h5>Spruik this feature</h5>
                                <p>
                                    Ned ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                    doloremque laudantium, totam rem aperiam, eaque ipsa.
                                </p>
                                <div class="mt-4">
                                    <div class="media rounded align-items-center pl-3 pr-3 pr-md-4 py-2 d-inline-flex text-left bg-secondary">
                                        <img src="assets/img/avatars/male-1.jpg" alt="Harvey Derwent avatar image"
                                             class="avatar avatar-sm flex-shrink-0 mr-3">
                                        <div class="text-dark mb-0">“Jumpstart increases productivity.”</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="contact-6" role="tabpanel" aria-labelledby="tab-3">
                        <div class="row justify-content-around align-items-center">
                            <div class="col-8 col-sm-4 col-lg-4 col-xl-5">
                                <img src="assets/img/mobile-app/mobile-app-4.png" alt="Screenshot" class="img-fluid">
                            </div>
                            <div class="col-sm col-md-6 mt-4 mt-sm-0">
                                <h5>Everything you could want</h5>
                                <p>
                                    Ned ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                    doloremque laudantium, totam rem aperiam, eaque ipsa.
                                </p>
                                <div class="mt-4">
                                    <div class="media rounded align-items-center pl-3 pr-3 pr-md-4 py-2 d-inline-flex text-left bg-secondary">
                                        <img src="assets/img/avatars/female-3.jpg" alt="Mary Goddard avatar image"
                                             class="avatar avatar-sm flex-shrink-0 mr-3">
                                        <div class="text-dark mb-0">“Top notch support on-call? Yes please.”</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="o-hidden bg-primary text-white">
    <div class="container">
        <div class="row align-items-center justify-content-around text-center text-lg-left">
            <div class="col-md-9 col-lg-6 col-xl-5 mb-4 mb-lg-0 pr-lg-5 pr-xl-0 order-lg-2">
                <div>
                    <h2 class="display-4">
                        Mobile app available
                    </h2>
                    <p class="lead">
                        UpCheck has the option to use our dashboard as an app on your mobile devices, but isn't
                        available on the App/Play Store.
                    </p>
                    <div class="d-flex flex-column flex-sm-row mt-4 mt-md-5 justify-content-center justify-content-lg-start">
                        <a onclick="prompt.open()" class="mr-2" title="Launch as Progressive Web App">
                            <img alt="Progressive Web App"
                                 src="https://user-images.githubusercontent.com/9122190/28998409-c5bf7362-7a00-11e7-9b63-db56694522e7.png"
                                 width="200px">
                        </a>
                    </div>
                    <br>
                    <a href="#" class="text-white">Why isn't our app available on the App/Play Store?</a>
                </div>
            </div>
            <div class="col-lg order-lg-1">
                <div class="row justify-content-center" data-jarallax-element="-50"
                     style="position: relative; z-index: 0; transform: translate3d(0px, 8.42691px, 0px);">
                    <div class="col-10 col-sm-8 col-md-6 col-lg-8 col-xl-6">
                        <img class="img-fluid position-relative" src="{{ asset('images/graphics/oneplus_mockup.png') }}"
                             alt="Screenshot">
                        <div class="h-50 w-50 position-absolute bottom left d-none d-lg-block"
                             data-jarallax-element="-50"
                             style="z-index: 0; transform: translate3d(0px, 57.1129px, 0px);">
                            <div class="blob blob-2 w-100 h-100 bg-primary-2 opacity-90 top right"></div>
                            <div id="jarallax-container-4"
                                 style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; overflow: hidden; pointer-events: none; z-index: -100;">
                                <div style="position: absolute;"></div>
                            </div>
                        </div>
                    </div>
                    <div id="jarallax-container-3"
                         style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; overflow: hidden; pointer-events: none; z-index: -100;">
                        <div style="position: fixed;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row section-title justify-content-center text-center">
            <div class="col-md-9 col-lg-8 col-xl-7">
                <h3 class="display-4">Boost your monitoring</h3>
                <div class="lead">Get started immediately, no credit card required</div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-7">
                <form class="d-flex flex-column flex-md-row">
                    <input class="form-control form-control-lg h-100" type="email" name="get-started-email"
                           placeholder="Email Address">
                    <button class="btn btn-lg btn-primary mt-2 mt-md-0 ml-md-3 flex-shrink-0" type="submit">Get
                        Started
                    </button>
                </form>
                <div class="mt-3 text-center text-small text-muted">
                    Free forever. We promise.
                </div>
            </div>
        </div>
    </div>
</section>

<footer class="bg-primary-3 text-white links-white pb-4 footer-1">
    <div class="container">
        <div class="row">
            <div class="col-xl-auto mr-xl-5 col-md-3 mb-4 mb-md-0">
                <h5>Services</h5>
                <ul class="nav flex-row flex-md-column">
                    <li class="nav-item mr-3 mr-md-0">
                        <a href="#" class="nav-link fade-page px-0 py-2">Uptime Monitoring</a>
                    </li>
                    <li class="nav-item mr-3 mr-md-0">
                        <a href="#" class="nav-link fade-page px-0 py-2">Status Pages</a>
                    </li>
                    <li class="nav-item mr-3 mr-md-0">
                        <a href="#" class="nav-link fade-page px-0 py-2">SSL Monitoring</a>
                    </li>
                    <li class="nav-item mr-3 mr-md-0">
                        <a href="#" class="nav-link fade-page px-0 py-2">Domain Expiration Monitoring</a>
                    </li>
                    <li class="nav-item mr-3 mr-md-0">
                        <a href="#" class="nav-link fade-page px-0 py-2">Broken Link Monitoring</a>
                    </li>
                    <li class="nav-item mr-3 mr-md-0">
                        <a href="#" class="nav-link fade-page px-0 py-2">Pricing</a>
                    </li>
                </ul>
            </div>
            <div class="col-xl-auto mr-xl-5 col-md-3">
                <h5>Company</h5>
                <ul class="nav flex-row flex-md-column">
                    <li class="nav-item mr-3 mr-md-0">
                        <a href="#" class="nav-link fade-page px-0 py-2">About</a>
                    </li>
                    <li class="nav-item mr-3 mr-md-0">
                        <a href="#" class="nav-link fade-page px-0 py-2">Locations</a>
                    </li>
                    <li class="nav-item mr-3 mr-md-0">
                        <a href="#" class="nav-link fade-page px-0 py-2">Terms of Service</a>
                    </li>
                    <li class="nav-item mr-3 mr-md-0">
                        <a href="#" class="nav-link fade-page px-0 py-2">Privacy Policy</a>
                    </li>
                    <li class="nav-item mr-3 mr-md-0">
                        <a href="#" class="nav-link fade-page px-0 py-2">Press Kit</a>
                    </li>
                    <li class="nav-item mr-3 mr-md-0">
                        <a href="#" class="nav-link fade-page px-0 py-2">GDPR</a>
                    </li>
                </ul>
            </div>
            <div class="col-xl-auto mr-xl-5 col-md-3">
                <h5>Support</h5>
                <ul class="nav flex-row flex-md-column">
                    <li class="nav-item mr-3 mr-md-0">
                        <a href="{!! url(config('tabler.urls.knowledgebase')) !!}" class="nav-link fade-page px-0 py-2">Knowledge
                            base</a>
                    </li>
                    <li class="nav-item mr-3 mr-md-0">
                        <a href="#" class="nav-link fade-page px-0 py-2">FAQ</a>
                    </li>
                    <li class="nav-item mr-3 mr-md-0">
                        <a href="#" class="nav-link fade-page px-0 py-2">Contact Us</a>
                    </li>
                    <li class="nav-item mr-3 mr-md-0">
                        <a href="https://twitter.com/UpCheckCo" class="nav-link fade-page px-0 py-2" target="_blank">
                            <i class="fab fa-twitter fa-fw">&nbsp;</i> Twitter</a>
                    </li>
                    <li class="nav-item mr-3 mr-md-0">
                        <a href="http://facebook.com/UpCheckCo" class="nav-link fade-page px-0 py-2" target="_blank">
                            <i class="fab fa-facebook-f fa-fw">&nbsp;&nbsp;</i> Facebook</a>
                    </li>
                </ul>
            </div>
            <div class="col-xl-auto mr-xl-5 col-md-3">
                <h5>Developers</h5>
                <ul class="nav flex-row flex-md-column">
                    <li class="nav-item mr-3 mr-md-0">
                        <a href="#" class="nav-link fade-page px-0 py-2">API</a>
                    </li>
                    <li class="nav-item mr-3 mr-md-0">
                        <a href="#" class="nav-link fade-page px-0 py-2">Webhooks</a>
                    </li>
                    <li class="nav-item mr-3 mr-md-0">
                        <a href="#" class="nav-link fade-page px-0 py-2">Latency Test</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<a href="#top" class="btn btn-primary rounded-circle btn-back-to-top" data-smooth-scroll data-aos="fade-up"
   data-aos-offset="2000" data-aos-mirror="true" data-aos-once="false">
    <i class="fas fa-chevron-up" fa-fw></i>
</a>
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
