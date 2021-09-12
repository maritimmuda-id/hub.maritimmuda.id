<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
    <link href="https://unpkg.com/@coreui/coreui@3.2/dist/css/coreui.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/css/perfect-scrollbar.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/lightgallery@2.x/css/lightgallery-bundle.min.css">
    @stack('styles')
</head>

<body class="c-app">

    @include('layouts.partials.menu')

    <div class="c-wrapper">
        <header class="c-header c-header-fixed px-3">
            <button class="c-header-toggler c-class-toggler d-lg-none mfe-auto" type="button" data-target="#sidebar"
                data-class="c-sidebar-show">
                <i class="fas fa-fw fa-bars"></i>
            </button>

            <a class="c-header-brand d-lg-none" href="{{ config('app.url') }}">{{ config('app.name') }}</a>

            <button class="c-header-toggler mfs-3 d-md-down-none" type="button" responsive="true">
                <i class="fas fa-fw fa-bars"></i>
            </button>

            <ul class="c-header-nav ml-auto">
                <li class="c-header-nav-item dropdown mx-2">
                    <a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        <i class="c-icon fas fa-globe"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right pt-0">
                        <div class="dropdown-header bg-light py-2">
                            <strong>@lang('Change Language')</strong>
                        </div>
                        <a class="dropdown-item" href="{{ url()->current() }}?lang=en">
                            <svg version="1.1" class="c-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                <circle style="fill:#F0F0F0;" cx="256" cy="256" r="256"/><g><path style="fill:#0052B4;" d="M52.92,100.142c-20.109,26.163-35.272,56.318-44.101,89.077h133.178L52.92,100.142z"/><path style="fill:#0052B4;" d="M503.181,189.219c-8.829-32.758-23.993-62.913-44.101-89.076l-89.075,89.076H503.181z"/><path style="fill:#0052B4;" d="M8.819,322.784c8.83,32.758,23.993,62.913,44.101,89.075l89.074-89.075L8.819,322.784L8.819,322.784 z"/><path style="fill:#0052B4;" d="M411.858,52.921c-26.163-20.109-56.317-35.272-89.076-44.102v133.177L411.858,52.921z"/><path style="fill:#0052B4;" d="M100.142,459.079c26.163,20.109,56.318,35.272,89.076,44.102V370.005L100.142,459.079z"/><path style="fill:#0052B4;" d="M189.217,8.819c-32.758,8.83-62.913,23.993-89.075,44.101l89.075,89.075V8.819z"/><path style="fill:#0052B4;" d="M322.783,503.181c32.758-8.83,62.913-23.993,89.075-44.101l-89.075-89.075V503.181z"/><path style="fill:#0052B4;" d="M370.005,322.784l89.075,89.076c20.108-26.162,35.272-56.318,44.101-89.076H370.005z"/></g><g><path style="fill:#D80027;" d="M509.833,222.609h-220.44h-0.001V2.167C278.461,0.744,267.317,0,256,0 c-11.319,0-22.461,0.744-33.391,2.167v220.44v0.001H2.167C0.744,233.539,0,244.683,0,256c0,11.319,0.744,22.461,2.167,33.391 h220.44h0.001v220.442C233.539,511.256,244.681,512,256,512c11.317,0,22.461-0.743,33.391-2.167v-220.44v-0.001h220.442 C511.256,278.461,512,267.319,512,256C512,244.683,511.256,233.539,509.833,222.609z"/><path style="fill:#D80027;" d="M322.783,322.784L322.783,322.784L437.019,437.02c5.254-5.252,10.266-10.743,15.048-16.435 l-97.802-97.802h-31.482V322.784z"/><path style="fill:#D80027;" d="M189.217,322.784h-0.002L74.98,437.019c5.252,5.254,10.743,10.266,16.435,15.048l97.802-97.804 V322.784z"/><path style="fill:#D80027;" d="M189.217,189.219v-0.002L74.981,74.98c-5.254,5.252-10.266,10.743-15.048,16.435l97.803,97.803 H189.217z"/><path style="fill:#D80027;" d="M322.783,189.219L322.783,189.219L437.02,74.981c-5.252-5.254-10.743-10.266-16.435-15.047 l-97.802,97.803V189.219z"/></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
                            <span class="ml-2">English</span>
                        </a>
                        <a class="dropdown-item" href="{{ url()->current() }}?lang=id">
                            <svg class="c-icon" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                <circle style="fill:#F0F0F0;" cx="256" cy="256" r="256"/><path style="fill:#A2001D;" d="M0,256C0,114.616,114.616,0,256,0s256,114.616,256,256"/><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
                            <span class="ml-2">Bahasa Indonesia</span>
                        </a>
                    </div>
                </li>
                <li class="c-header-nav-item dropdown">
                    <a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        <div class="c-avatar">
                            <img class="c-avatar-img" src="{{ auth()->user()->photo_thumb_link }}" alt="{{ auth()->user()->email }}">
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right pt-0">
                        <div class="dropdown-header bg-light py-2">
                            <strong>Account</strong>
                        </div>
                        <a class="dropdown-item" href="{{ route('profile.edit') }}">
                            <i class="mfe-2 fas fa-user"></i>
                            @lang('navigation.profile')
                        </a>
                        @impersonating
                            <a href="{{ route('impersonate.leave') }}" class="dropdown-item">
                                <i class="mfe-2 fas fa-sign-out-alt"></i>
                                @lang('navigation.leave-impersonation')
                            </a>
                        @endImpersonating
                        <a href="javacript:void(0)" class="dropdown-item" onclick="event.preventDefault();document.getElementById('logoutform').submit();">
                            <i class="mfe-2 fas fa-sign-out-alt"></i>
                            @lang('navigation.logout')
                        </a>
                    </div>
                </li>
            </ul>
        </header>

        <div class="c-body">
            <main class="c-main">
                <div class="container-fluid">
                    @if(session('message'))
                        <div class="row mb-2">
                            <div class="col-lg-12">
                                <div class="alert alert-success" role="alert">{{ session('message') }}</div>
                            </div>
                        </div>
                    @endif
                    @if($errors->count() > 0)
                        <div class="alert alert-danger">
                            <ul class="list-unstyled">
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="content">
                        <div class="row">
                            <div class="col-lg-12">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <x-form id="logoutform" :action="route('logout')" style="display: none;" />
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script defer src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/perfect-scrollbar.min.js"></script>
    <script defer src="https://unpkg.com/@coreui/coreui@3.2/dist/js/coreui.min.js"></script>
    <script defer src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script defer src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script defer src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
    @include('sweetalert::alert', ['cdn' => 'https://unpkg.com/sweetalert2@11.x/dist/sweetalert2.all.min.js'])
    <script src="https://unpkg.com/lightgallery@2.x/lightgallery.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    @stack('scripts')
</body>
</html>
