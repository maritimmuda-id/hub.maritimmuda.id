<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">
    <div class="c-sidebar-brand bg-white d-md-down-none">
        <img class="c-sidebar-brand-full img-fluid p-1" height="40" src="https://res.cloudinary.com/zhanang19/image/upload/q_auto,c_scale,h_40/v1630384690/11_nr53qu.png" alt="{{ config('app.name') }}">
    </div>

    <ul class="c-sidebar-nav">
        @auth
            <li class="c-sidebar-nav-item">
                <x-nav-link
                    :href="route('dashboard')"
                    :active="request()->routeIs('dashboard')"
                    :label="trans('navigation.dashboard')"
                    icon="fas fa-tachometer-alt"
                />
            </li>
        @endauth
        @can('viewAny', \App\Models\User::class)
            <li class="c-sidebar-nav-item">
                <x-nav-link
                    :href="route('user.index')"
                    :active="request()->routeIs('user.*')"
                    :label="trans('navigation.user')"
                    icon="fas fa-users"
                />
            </li>
        @endcan
        @can('find-member')
            <li class="c-sidebar-nav-item">
                <x-nav-link
                    :href="route('find-member')"
                    :active="request()->routeIs('find-member')"
                    :label="trans('navigation.find-member')"
                    icon="fas fa-user-friends"
                />
            </li>
        @endcan
        @can('viewAny', \App\Models\Event::class)
            <li class="c-sidebar-nav-item">
                <x-nav-link
                    :href="route('event.index')"
                    :active="request()->routeIs('event.*')"
                    :label="trans('navigation.event')"
                    icon="fas fa-calendar"
                />
            </li>
        @endcan
        @can('viewAny', \App\Models\Scholarship::class)
            <li class="c-sidebar-nav-item">
                <x-nav-link
                    :href="route('scholarship.index')"
                    :active="request()->routeIs('scholarship.*')"
                    :label="trans('navigation.scholarship')"
                    icon="fas fa-money-bill-alt"
                />
            </li>
        @endcan
        @can('viewAny', \App\Models\JobPost::class)
            <li class="c-sidebar-nav-item">
                <x-nav-link
                    :href="route('job-post.index')"
                    :active="request()->routeIs('job-post.*')"
                    :label="trans('navigation.job-post')"
                    icon="fas fa-briefcase"
                />
            </li>
        @endcan
        @impersonating
            <li class="c-sidebar-nav-item">
                <a href="{{ route('impersonate.leave') }}" role="button" class="c-sidebar-nav-link">
                    <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt"></i>
                    @lang('navigation.leave-impersonation')
                </a>
            </li>
        @endImpersonating
        @auth
            <li class="c-sidebar-nav-item">
                <a href="javacript:void(0)" role="button" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt"></i>
                    @lang('navigation.logout')
                </a>
            </li>
        @endauth
    </ul>
</div>
