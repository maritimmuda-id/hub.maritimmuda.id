<ul class="nav nav-tabs" style="overflow-x:auto;overflow-y:hidden;flex-wrap:nowrap;align-items:center;text-align:center;">
    <li class="nav-item">
        <a
            class="nav-link{{ request()->routeIs('profile.edit') ? ' active' : '' }}"
            href="{{ route('profile.edit') }}"
        >
            @lang('profile.general')
        </a>
    </li>
    <li class="nav-item">
        <a
            class="nav-link{{ request()->routeIs('profile.education-history') ? ' active' : '' }}"
            href="{{ route('profile.education-history') }}"
        >
            @lang('profile.education-history.navigation')</a>
    </li>
    <li class="nav-item">
        <a
            class="nav-link{{ request()->routeIs('profile.work-experience') ? ' active' : '' }}"
            href="{{ route('profile.work-experience') }}"
        >
            @lang('profile.work-experience.navigation')</a>
    </li>
    <li class="nav-item">
        <a
            class="nav-link{{ request()->routeIs('profile.organization-history') ? ' active' : '' }}"
            href="{{ route('profile.organization-history') }}"
        >
            @lang('profile.organization-history.navigation')</a>
    </li>
    <li class="nav-item">
        <a
            class="nav-link{{ request()->routeIs('profile.achievement-history') ? ' active' : '' }}"
            href="{{ route('profile.achievement-history') }}"
        >
            @lang('profile.achievement-history.navigation')</a>
    </li>
    <li class="nav-item">
        <a
            class="nav-link{{ request()->routeIs('profile.publication') ? ' active' : '' }}"
            href="{{ route('profile.publication') }}"
        >
            @lang('profile.publication.navigation')</a>
    </li>
    <li class="nav-item">
        <a
            class="nav-link{{ request()->routeIs('profile.dedication') ? ' active' : '' }}"
            href="{{ route('profile.dedication') }}"
        >
            @lang('profile.dedication.navigation')</a>
    </li>
    <li class="nav-item">
        <a
            class="nav-link{{ request()->routeIs('profile.research') ? ' active' : '' }}"
            href="{{ route('profile.research') }}"
        >
            @lang('profile.research.navigation')</a>
    </li>
</ul>
@push('scripts')
    @livewireStyles
    @livewireScripts
    <script src="https://unpkg.com/livewire-sortable@0.2.2/dist/livewire-sortable.js"></script>
    <script>
        $(function () {
            Livewire.on('toast', function (data) {
                Swal.fire({
                    "title": data.title,
                    "timer": 5000,
                    "showConfirmButton": false,
                    "showCloseButton": true,
                    "toast": true,
                    "icon": data.icon,
                    "position": "top-end"
                });
            });
        });
    </script>
@endpush
