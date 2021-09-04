<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">
    <div class="c-sidebar-brand d-md-down-none">
        <strong class="c-sidebar-brand-full h4">
            {{ config('app.name') }}
        </strong>
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
