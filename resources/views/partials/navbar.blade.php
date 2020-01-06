<nav class="navbar navbar-expand-lg navbar-light" data-sticky="top">
    <div class="container">
        <a class="navbar-brand fade-page" href="{{ route('home') }}">
            <img alt="UpCheck" src="https://res.cloudinary.com/upcheck/image/upload/v1577380021/logos/text-logo-2_bhcncr.png" height="30px">
        </a>
        <div class="collapse navbar-collapse order-3 order-lg-2 justify-content-lg-end" id="navigation-menu">
            <ul class="navbar-nav my-3 my-lg-0">
                <li class="nav-item {{ (request()->is('/')) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="productsDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Products
                    </a>
                    <div class="dropdown-menu" aria-labelledby="productsDropdown">
                        <a class="dropdown-item" href="#"><i class="far fa-file-upload fa-fw"></i> Uptime monitoring</a>
                        <a class="dropdown-item" href="#"><i class="far fa-tachometer-alt-fast fa-fw"></i> Page speed
                            monitoring</a>
                        <a class="dropdown-item" href="#"><i class="far fa-server fa-fw"></i> Server Monitoring</a>
                        <a class="dropdown-item" href="#"><i class="far fa-bell fa-fw"></i> Alerts</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="resourcesDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Resources
                    </a>
                    <div class="dropdown-menu" aria-labelledby="resourcesDropdown">
                        <a class="dropdown-item" href="#"><i class="far fa-book-open fa-fw"></i> UpCheck API</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#"><i class="far fa-question-circle fa-fw"></i> Tutorials</a>
                        <a class="dropdown-item" href="#"><i class="far fa-cogs fa-fw"></i> Webhooks</a>
                        <a class="dropdown-item" href="#"><i class="far fa-file-archive fa-fw"></i> Brand assets</a>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pricing') }}">Pricing</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Support</a>
                </li>
            </ul>
        </div>

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
    </div>
</nav>