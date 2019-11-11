@extends('layouts.home')
@section('content')
    <section class="text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12" style="word-break: break-word">
                    <h1>Hi there, we're
                        <span class="color--primary">{{ config('app.name', 'Laravel') }}.</span>
                        <br class="hidden-xs hidden-sm"/> We provide simple and reliable uptime monitoring.</h1>
                    <a class="btn btn--primary btn--lg type--uppercase" href="#">
                                <span class="btn__text">
                                    Get Started FREE
                                </span>
                    </a>
                    <span class="block type--fine-print">
                                Or request a FREE
                                <a href="#">product demonstration</a>
                            </span>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>
    <section class="text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-9">
                    <div class="bg--dark box-shadow-wide">
                        <img alt="Image" src="img/software-1.jpg"/>
                    </div>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>
    <section class="border--bottom space--xxs ">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="modal-instance">
                        <a class="btn type--uppercase modal-trigger" href="#">
                                    <span class="btn__text">
                                        &#9654; Watch Overview
                                    </span>
                        </a>
                        <div class="modal-container">
                            <div class="modal-content bg-dark" data-width="60%" data-height="60%">
                                <iframe data-src="https://www.youtube.com/embed/6p45ooZOOPo?autoplay=1"
                                        allowfullscreen="allowfullscreen"></iframe>
                            </div>
                            <!--end of modal-content-->
                        </div>
                        <!--end of modal-container-->
                    </div>
                    <!--end of modal instance-->
                    <span class="block--xs">and see how Stack makes building your site fun</span>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>
    <section class="switchable bg--secondary">
        <div class="container">
            <div class="row justify-content-around">
                <div class="col-md-6 col-lg-5 mt--2">
                    <ul class="accordion accordion-2 accordion--oneopen">
                        <li class="active">
                            <div class="accordion__title">
                                <span class="h5">Code Quality</span>
                            </div>
                            <div class="accordion__content">
                                <p class="lead">
                                    Stack follows the BEM naming convention that focusses on logical code readability
                                    that is reflected in both the HTML and CSS. Interactive elements such as accordions
                                    and tabs follow the same markup patterns making rapid development easier for
                                    developers and beginners alike.
                                </p>
                            </div>
                        </li>
                        <li>
                            <div class="accordion__title">
                                <span class="h5">Visual Design</span>
                            </div>
                            <div class="accordion__content">
                                <p class="lead">
                                    Stack offers a clean and contemporary to suit a range of purposes from corporate,
                                    tech startup, marketing site to digital storefront. Elements have been designed to
                                    showcase content in a diverse yet consistent manner.
                                </p>
                                <p class="lead">
                                    Multiple font and colour scheme options mean that dramatically altering the look of
                                    your site is just clicks away &mdash; Customizing your site in the included Variant
                                    Page Builder makes experimenting with styles and content arrangements dead simple.
                                </p>
                            </div>
                        </li>
                        <li>
                            <div class="accordion__title">
                                <span class="h5">Stack Experience</span>
                            </div>
                            <div class="accordion__content">
                                <p class="lead">
                                    Medium Rare is an elite author known for offering high-quality, high-value products
                                    backed by timely and personable support. Recognised and awarded by Envato on
                                    multiple occasions for producing consistently outstanding products, it's no wonder
                                    over 20,000 customers enjoy using Medium Rare templates.
                                </p>
                            </div>
                        </li>
                    </ul>
                    <!--end accordion-->
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="slider box-shadow-wide border--round" data-paging="true">
                        <ul class="slides">
                            <li>
                                <img alt="img" src="img/software-2.jpg"/>
                            </li>
                            <li>
                                <img alt="img" src="img/software-3.jpg"/>
                            </li>
                            <li>
                                <img alt="img" src="img/software-4.jpg"/>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>
    <section class="bg--secondary">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="feature">
                        <i class="icon icon-Sidebar-Window color--primary"></i>
                        <h4>Instant Alerts</h4>
                        <p>
                            Get notified as soon as your monitor goes down
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature">
                        <i class="icon icon-Duplicate-Window color--primary"></i>
                        <h4>Invite Teammates</h4>
                        <p>
                            Invite your teammates to share monitors and alerts
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature">
                        <i class="icon icon-Code-Window color--primary"></i>
                        <h4>Customizable Checks</h4>
                        <p>
                            It doesn't matter if you want to monitor a MySQL server or monitor HTTP responses, you can customize the check method.
                        </p>
                    </div>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>
    <section class=" bg--dark">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="slider slider--inline-arrows" data-arrows="true">
                        <ul class="slides">
                            <li>
                                <div class="testimonial row justify-content-center">
                                    <div class="col-lg-2 col-md-4 col-6 text-center">
                                        <img class="testimonial__image" alt="Image" src="img/avatar-round-1.png"/>
                                    </div>
                                    <div class="col-lg-7 col-md-8 col-12">
                                                <span class="h3">&ldquo;We’ve been using Stack to prototype designs quickly and efficiently. Needless to say we’re hugely impressed by the style and value.&rdquo;
                                                </span>
                                        <h5>Maguerite Holland</h5>
                                        <span>Interface Designer &mdash; Yoke</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="testimonial row justify-content-center">
                                    <div class="col-lg-2 col-md-4 col-6 text-center">
                                        <img class="testimonial__image" alt="Image" src="img/avatar-round-4.png"/>
                                    </div>
                                    <div class="col-lg-7 col-md-8 col-12">
                                                <span class="h3">&ldquo;I've been using Medium Rare's templates for a couple of years now and Stack is without a doubt their best work yet. It's fast, performant and absolutely stunning.&rdquo;
                                                </span>
                                        <h5>Lucas Nguyen</h5>
                                        <span>Freelance Designer</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="testimonial row justify-content-center">
                                    <div class="col-lg-2 col-md-4 col-6 text-center">
                                        <img class="testimonial__image" alt="Image" src="img/avatar-round-3.png"/>
                                    </div>
                                    <div class="col-lg-7 col-md-8 col-12">
                                                <span class="h3">&ldquo;Variant has been a massive plus for my workflow &mdash; I can now get live mockups out in a matter of hours, my clients really love it.&rdquo;
                                                </span>
                                        <h5>Rob Vasquez</h5>
                                        <span>Interface Designer &mdash; Yoke</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>
    <section class="switchable switchable--switch space--md">
        <div class="container">
            <div class="row justify-content-around">
                <div class="col-md-6 col-lg-5">
                    <span class="h1">Get started in just 5 seconds</span>
                    <p class="lead">Start building a beautiful site for your startup &mdash;
                        <br class="hidden-xs hidden-sm"/> right in the comfort of your browser.</p>
                    <hr class="short">
                    <form>
                        <div class="row">
                            <div class="col-12">
                                <input type="email" name="Email Address" placeholder="Email Address"/>
                            </div>
                            <div class="col-12">
                                <input type="password" name="Password" placeholder="Password"/>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn--primary type--uppercase">Create Account</button>
                            </div>
                            <div class="col-12">
                                        <span class="type--fine-print">By signing up, you agree to our
                                            <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>
                                        </span>
                            </div>
                        </div>
                        <!--end row-->
                    </form>
                </div>
                <div class="col-md-6 col-lg-5">
                    <img alt="Image" class="border--round" src="{{ asset('images/graphics/register.svg') }}"/>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>
    <section class="text-center bg--secondary space--xs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="list-inline list-inline--images">
                        <li>
                            <img alt="Image" src="img/partner-1.png"/>
                        </li>
                        <li>
                            <img alt="Image" src="img/partner-5.png"/>
                        </li>
                        <li>
                            <img alt="Image" src="img/partner-7.png"/>
                        </li>
                        <li>
                            <img alt="Image" src="img/partner-4.png"/>
                        </li>
                        <li>
                            <img alt="Image" src="img/partner-6.png"/>
                        </li>
                    </ul>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>
@stop
