<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">
    <div class="c-sidebar-brand d-md-down-none">
        <a href="{{ config('app.url') }}" class="c-sidebar-brand-full h4">
            {{ config('app.name') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route('dashboard') }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt"></i>
                @lang('navigation.dashboard')
            </a>
        </li>
        <li class="c-sidebar-nav-item">
            <a href="javacript:void(0)" role="button" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt"></i>
                @lang('navigation.logout')
            </a>
        </li>
    </ul>
</div>
