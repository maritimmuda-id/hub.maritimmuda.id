@extends('layouts.panel')

@section('content')
    <div class="pt-4">
        <h1 class="d-inline p-4">
            <b><i class="fas fa-th-large"></i> @lang('navigation.overview')</b>
        </h1>
    </div>

    <div class="card p-3 ml-4 mr-4 mt-4 mb-0" style="border: none;">
        <div class="card-header" style="border-bottom: none;">
            <h4 class="d-inline pb-3">
                <b><i class="fas fa-bullhorn animate-bounce"></i> @lang('dashboard.announcement')</b>
            </h4>
            <div class="card-header-actions">
                @if(auth()->user()->is_admin)
                    <button id="edit-btn" class="btn btn-sm btn-info edit-btn">
                        <i class="fas fa-edit"></i> <span class="d-none d-sm-inline-block">@lang('Edit')</span>
                    </button>
                    <button id="back-btn" class="btn btn-sm btn-secondary d-none">
                        <i class="fas fa-arrow-left"></i> <span class="d-none d-sm-inline-block">@lang('Back')</span>
                    </button>
                @endif
            </div>
        </div>

        <div class="card-body">
            <div id="announcement-display" class="card mb-0" style="border: none;">
                @if ($announcement)
                    <h5>{{ $announcement->title }}</h5>
                    <p class="m-0">{{ $announcement->content }}.
                        @if($announcement->link)
                            <a href="{{ $announcement->link }}" target="_blank">Klik Disini. </a>
                        @endif
                        <span class="text-muted">-{{ $announcement->updated_at->format('d M Y') }}</span>
                    </p>
                @else
                    <p class="m-0">@lang('dashboard.no-announcement')</p>
                @endif
            </div>

            <div id="announcement-edit" style="display: none;">
                <form id="announcement-form" action="{{ route('announcement.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">@lang('Title')</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $announcement->title ?? ''}}">
                    </div>
                    <div class="form-group">
                        <label for="content">@lang('Content')</label>
                        <textarea class="form-control" id="content" name="content" rows="3">{{ $announcement->content ?? ''}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="link">@lang('Link')</label>
                        <input type="text" class="form-control" id="link" name="link" value="{{ $announcement->link ?? ''}}">
                    </div>
                    <!-- <div class="card-footer pl-0 pt-5" style="border: none;">
                        <x-save-button href="{{ route('announcement.update') }}" />
                    </div> -->
                </form>
                <form id="delete-form" action="{{ route('announcement.delete') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <!-- <button type="button" onclick="confirmDelete()" class="btn btn-sm btn-danger mb-2"><i class="fas fa-trash"></i> @lang('product.action-delete')</button> -->
                </form>
                <!-- <button type="submit" form="announcement-form" id="sendButton" class="btn btn-primary">{{ __('membership.confirm-text-mail') }}</button> -->
                <div class="card-footer pl-0 pt-5" style="border: none;">
                    <x-save-button form="announcement-form" href="{{ route('announcement.update') }}" />
                    <button type="button" form="delete-form" onclick="confirmDelete()" class="btn btn-sm btn-danger ml-2"><i class="fas fa-trash"></i> @lang('product.action-delete')</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const editBtn = document.getElementById('edit-btn');
            const backBtn = document.getElementById('back-btn');
            const announcementDisplay = document.getElementById('announcement-display');
            const announcementEdit = document.getElementById('announcement-edit');

            editBtn.addEventListener('click', function() {
                announcementDisplay.style.display = 'none';
                announcementEdit.style.display = 'block';
                editBtn.classList.add('d-none');
                backBtn.classList.remove('d-none');
            });

            backBtn.addEventListener('click', function() {
                announcementDisplay.style.display = 'block';
                announcementEdit.style.display = 'none';
                editBtn.classList.remove('d-none');
                backBtn.classList.add('d-none');
            });
        });

        function confirmDelete() {
            if (confirm('Are you sure you want to delete?')) {
                document.getElementById('delete-form').submit();
            }
        }
    </script>

    <div class="card-body pt-0 pb-0">
        @if ($user && $user->uid !== null)
            @php
                $latestMembership = $user->memberships()->orderBy('id', 'desc')->first();
            @endphp

            @if ($latestMembership)
                @php
                    $expiredAt = \Carbon\Carbon::parse($latestMembership->expired_at);
                    $now = \Carbon\Carbon::now();
                @endphp

                @if ($expiredAt < $now->addDays(-1))
                    <div class="card p-3 mb-0 mt-4" style="background-color: #d95353; border: none; color: white;">
                        <h5><i class="fas fa-times"></i> {{ trans('verify-membership.title_expired') }} <i class="fas fa-times"></i></h5>
                        <a class="d-none d-sm-inline" style="color: white;" href="{{ route('profile.edit') }}">
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline" style="color: white;">{{ trans('verify-membership.notice_5') }}</button>.
                        </a>
                    </div>
                @elseif ($expiredAt < $now->addDays(1))
                    <div class="card p-3 mb-0 mt-4" style="background-color: #ffcb3d; border: none; color: white;">
                        <h5><i class="fas fa-exclamation"></i> {{ trans('verify-membership.title_expired-1') }}</h5>
                        <a class="d-none d-sm-inline" style="color: white;" href="{{ route('profile.edit') }}">
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline" style="color: white;">{{ trans('verify-membership.notice_5') }}</button>.
                        </a>
                    </div>
                @elseif ($expiredAt < $now->addDays(3))
                    <div class="card p-3 mb-0 mt-4" style="background-color: #ffcb3d; border: none; color: white;">
                        <h5><i class="fas fa-exclamation"></i> {{ trans('verify-membership.title_expired-3') }}</h5>
                        <a class="d-none d-sm-inline" style="color: white;" href="{{ route('profile.edit') }}">
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline" style="color: white;">{{ trans('verify-membership.notice_5') }}</button>.
                        </a>
                    </div>
                @elseif ($expiredAt < $now->addDays(30))
                    <div class="card p-3 mb-0 mt-4" style="background-color: #ffcb3d; border: none; color: white;">
                        <h5><i class="fas fa-exclamation"></i> {{ trans('verify-membership.title_expired-30') }}</h5>
                        <a class="d-none d-sm-inline" style="color: white;" href="{{ route('profile.edit') }}">
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline" style="color: white;">{{ trans('verify-membership.notice_6') }}</button>
                        </a>
                    </div>
                @endif
            @endif
        @endif
    </div>


    <div class="row mt-4 ml-4 mr-4 d-flex justify-content-between align-items-stretch">
        <div class="card col-12 col-md-6 mb-4 mb-md-0 flex-custom" style="border: none; background-color: #13abc3; color: white;">
            <div class="d-flex justify-content-center align-items-center" style="padding: 20px;">
                <div class="row col-15 col-lg-10 d-flex justify-content-between align-items-stretch">
                    <div class="mt-5 mb-5 col-lg-7">
                        <h1 class="p-0 col-lg-10" style="font-size: 25px;">@lang('dashboard.welcome-label') <br><b>{{ Illuminate\Support\Str::limit(auth()->user()->name, 15, '...') }}! </b></h1>
                    </div>
                    <div class="p-3 d-none d-md-block" style="width:40%; padding: 20px;">
                        <img src="{{ asset('/img/Welcome aboard-pana.svg') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-0 col-12 col-md-6 flex-custom" style="border: none; background-color: #ffcb3d;">
            <div class="d-flex justify-content-center align-items-center" style="padding: 20px;">
                <div class="row col-15 col-lg-10 d-flex justify-content-between align-items-stretch">
                    <div class="mt-5 mb-5 col-lg-7">
                        <h1 style="font-size: 25px;"><b>@lang('discount.discount-label')</b></h1>
                    </div>
                    <div class="p-3 d-none d-md-block" style="width:40%; padding: 20px;">
                        <img src="{{ asset('/img/Discount-amico.svg') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            @foreach ($widgets as $widget)
                <div class="col-6 col-lg-3">
                    <div class="card p-3 m-1" style="border: none;">
                        <div class="card-body p-3 align-items-center">
                            <div class="text-value text-center" style="font-size: 70px; color: #3c4b64;">{{ $widget['value'] }}</div>
                            <div class="text-muted text-uppercase font-weight-bold small text-center">{{ $widget['label'] }}
                            </div>
                        </div>
                        <div class="view-more px-3 py-2">
                            <a href="{{ $widget['action'] }}"
                                class="btn-block d-flex justify-content-between align-items-center">
                                <span class="small font-weight-bold">@lang('View More')</span>
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
