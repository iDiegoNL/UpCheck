@extends('layouts.home')
@section('content')
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
                    <img src="https://res.cloudinary.com/upcheck/image/upload/v1577379995/graphics/data-trends_lzs3ny.svg" alt="Image"
                         class="img-fluid">
                </div>
            </div>
        </div>
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
                    <img src="https://res.cloudinary.com/upcheck/image/upload/v1577379993/graphics/notify_kcmd6j.svg" alt="Notifications" class="img-fluid">
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
                    <img src="https://res.cloudinary.com/upcheck/image/upload/v1577379993/graphics/inspiration_kupjkh.svg" alt="Inspiration" class="img-fluid">
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
                                     src="https://res.cloudinary.com/upcheck/image/upload/v1577380314/graphics/pwa-button_rfwfw1.png"
                                     width="200px">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg order-lg-1">
                    <div class="row justify-content-center" data-jarallax-element="-50"
                         style="position: relative; z-index: 0; transform: translate3d(0px, 8.42691px, 0px);">
                        <div class="col-10 col-sm-8 col-md-6 col-lg-8 col-xl-6">
                            <img class="img-fluid position-relative" src="https://res.cloudinary.com/upcheck/image/upload/v1577378910/mockups/upcheck-mockup_fqxw2g.png"
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
@stop
