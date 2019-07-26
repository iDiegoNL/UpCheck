<div class="col-md-3">
    <h3 class="page-title mb-5">Settings</h3>
    <div>
        <div class="list-group list-group-transparent">
            <a href="{{ route('settings.profile') }}" class="list-group-item list-group-item-action d-flex align-items-center {{ (request()->is('settings/profile')) ? 'active' : '' }}">
                <span class="icon mr-3"><i class="far fa-user"></i></span>Profile
            </a>
            <a href="{{ route('settings.account') }}" class="list-group-item list-group-item-action d-flex align-items-center {{ (request()->is('settings/account')) ? 'active' : '' }}">
                <span class="icon mr-3"><i class="far fa-id-card"></i></span>Account
            </a>

            <span class="dropdown-divider"></span>
            <span class="dropdown-header">Security</span>

            <a href="{{ route('settings.password') }}" class="list-group-item list-group-item-action d-flex align-items-center {{ (request()->is('settings/password')) ? 'active' : '' }}">
                <span class="icon mr-3"><i class="fal fa-key"></i></span>Change Password
            </a>
            <a href="{{ route('settings.mfa') }}" class="list-group-item list-group-item-action d-flex align-items-center {{ (request()->is('settings/mfa')) ? 'active' : '' }}">
                <span class="icon mr-3"><i class="far fa-fingerprint"></i></span>Two-Factor Authentication
            </a>
        </div>
    </div>
</div>
