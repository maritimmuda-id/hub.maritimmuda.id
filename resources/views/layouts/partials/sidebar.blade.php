<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show" style="background-color: #323f54;">
    <div class="c-sidebar-brand d-md-down-none" style="padding: 40px; background-color: #323f54;">
        <img class="c-sidebar-brand-full img-fluid" src="{{ asset('img/logo-300.png') }}" alt="{{ config('app.name') }}" style="height: 70px;">
    </div>

    <ul class="c-sidebar-nav pt-sm-3">
        <h6 class="ml-3 mb-0 text-uppercase" style="font-size: 12px;"><b>@lang('navigation.dashboard')</b></h6>
        @auth
            <li class="c-sidebar-nav-item">
                <x-nav-link
                    :href="route('dashboard')"
                    :active="request()->routeIs('dashboard')"
                    :label="trans('navigation.overview')"
                    icon="fas fa-th-large"
                />
            </li>
        @endauth
        @can('viewAny', \App\Models\User::class)
            <li class="c-sidebar-nav-item">
                <x-nav-link
                    :href="route('user.index')"
                    :active="request()->routeIs('user.*')"
                    :label="trans('navigation.user-sidebar-adm', ['adm' => '<span class=\'admin\'><i class=\'fas fa-key\'></i> Admin</span>'])"
                    icon="fas fa-users"
                />
            </li>
        @endcan
        @can('viewDev', \App\Models\User::class)
            <li class="c-sidebar-nav-item">
                <x-nav-link
                    :href="route('developer')"
                    :active="request()->routeIs('developer')"
                    :label="trans('navigation.user-sidebar-dev', ['dev' => '<span class=\'developer\'><i class=\'fas fa-code\'></i> Developer</span>'])"
                    icon="fas fa-laptop-code"
                />
            </li>
        @endcan
        @can('find-member')
        <li class="c-sidebar-nav-item">
            <x-nav-link
                :href="route('store')"
                :active="request()->routeIs('store')"
                :label="trans('navigation.product')"
                icon="fas fa-shopping-cart"
            />
        </li>
        @endcan
        <br>
        <h6 class="ml-3 mb-0 text-uppercase" style="font-size: 12px;"><b>@lang('navigation.membership')</b></h6>
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
                    icon="fas fa-calendar-alt"
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
        <br>
        <h6 class="ml-3 mb-0 text-uppercase" style="font-size: 12px;"><b>@lang('navigation.actions')</b></h6>
        @impersonating
            <li class="c-sidebar-nav-item">
                <a href="{{ route('impersonate.leave') }}" role="button" class="c-sidebar-nav-link c-nav-out">
                    <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt"></i>
                    @lang('navigation.leave-impersonation-sidebar', ['adm' => '<span class="admin"><i class="fas fa-key"></i> Admin</span>'])
                </a>
            </li>
        @endImpersonating
        @auth
            <li class="c-sidebar-nav-item">
                <a href="javacript:void(0)" role="button" class="c-sidebar-nav-link c-nav-out" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt"></i>
                    @lang('navigation.logout')
                </a>
            </li>
            {{-- <li class="c-sidebar-nav-item">
                <div class="c-nav-account pt-3 pb-3">
                    <div class="row ml-3 mr-3 align-items-center">
                        <img class="c-avatar-img" style="width:20%; height:20%;" src="{{ auth()->user()->photo_thumb_link }}" alt="{{ auth()->user()->email }}">
                        <div class="ml-3 mt-1 mb-1 mr-3">
                            <h5 class="mb-0"><b>{{ Illuminate\Support\Str::limit(auth()->user()->name, 8, '...') }}</b></h5>
                            <h6 class="mb-0">{{ Illuminate\Support\Str::limit(auth()->user()->email, 13, '...') }}</h6>
                        </div>
                        <div class="dropdown-new right-0 absolute">
                            <i id="ellipsisIcon" class="fas fa-ellipsis-v" style="color: white; cursor: pointer;"></i>
                            <div class="dropdown-options" id="dropdownOptions">
                                <a href="{{ route('profile.edit') }}">
                                    @lang('navigation.profile')
                                </a>
                                @impersonating
                                <a href="{{ route('impersonate.leave') }}">
                                    @lang('navigation.leave-impersonation')
                                </a>
                                @endImpersonating
                                <a href="javacript:void(0)"
                                onclick="event.preventDefault();document.getElementById('logoutform').submit();">
                                    @lang('navigation.logout')
                                </a>
                            </div>
                        </div>
                        <script>
                            var ellipsisIcon = document.getElementById('ellipsisIcon');
                            var dropdownOptions = document.getElementById('dropdownOptions');

                            document.addEventListener('click', function(event) {
                                if (event.target !== ellipsisIcon && !ellipsisIcon.contains(event.target)) {
                                    // Click occurred outside the ellipsis icon
                                    dropdownOptions.classList.remove('show');
                                }
                            });

                            ellipsisIcon.addEventListener('click', function(event) {
                                // Toggle the 'show' class when the ellipsis icon is clicked
                                dropdownOptions.classList.toggle('show');
                                // Prevent the click event from propagating to the document click listener
                                event.stopPropagation();
                            });
                        </script>
                    </div>
                </div>
            </li> --}}
        @endauth
    </ul>
</div>
