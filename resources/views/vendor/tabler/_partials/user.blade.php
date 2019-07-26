<div class="dropdown">
    <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
        <span class="avatar" style="background-image: url('{{ $user->getUrlfriendlyAvatar() }}')"></span>
        <span class="ml-2 d-none d-lg-block">
            <span class="text-default">{{ Auth::user()->name }}</span>
            <small class="text-muted d-block mt-1">{{ Auth::user()->email }}</small>
        </span>
    </a>
    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
        <a class="dropdown-item" href="{{ route('settings.profile') }}">
            <i class="dropdown-icon fe fe-settings"></i> Settings
        </a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="{!! url(config('tabler.urls.knowledgebase')) !!}">
            <i class="dropdown-icon fe fe-help-circle"></i> Knowledgebase
        </a>
        <a class="dropdown-item" href="{!! url(config('tabler.urls.support')) !!}">
            <i class="dropdown-icon fe fe-life-buoy"></i> Support
        </a>
        <a class="dropdown-item" href="#" onclick="darkmode.toggle();">
            <i class="dropdown-icon far fa-moon"></i> Toggle Nightmode <span class="badge badge-warning">experimental</span>
        </a>
        <a class="dropdown-item" href="{!! url(config('tabler.urls.logout')) !!}">
            <i class="dropdown-icon fe fe-log-out"></i> Logout
        </a>
    </div>
</div>
