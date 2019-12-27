@extends('layouts.home')
@section('content')
    <section class="bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-9 col-md-11">
                    <div class="card card-body shadow">
                        <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start pb-4 mb-4 mb-md-5 border-bottom">
                            <div class="mb-3 mb-md-0">
                                <h1 class="mb-2">Privacy Policy</h1>
                            </div>
                        </div>
                        <article class="article">
                            <a href="https://www.iubenda.com/privacy-policy/16060119"
                               class="iubenda-white no-brand iubenda-embed iub-body-embed" title="Privacy Policy">
                                Privacy Policy
                            </a>
                            <script type="text/javascript">(function (w, d) {
                                    var loader = function () {
                                        var s = d.createElement("script"), tag = d.getElementsByTagName("script")[0];
                                        s.src = "https://cdn.iubenda.com/iubenda.js";
                                        tag.parentNode.insertBefore(s, tag);
                                    };
                                    if (w.addEventListener) {
                                        w.addEventListener("load", loader, false);
                                    } else if (w.attachEvent) {
                                        w.attachEvent("onload", loader);
                                    } else {
                                        w.onload = loader;
                                    }
                                })(window, document);</script>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection