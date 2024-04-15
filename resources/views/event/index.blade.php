@extends('layouts.panel')
@section('content')
    <div class="pt-4">
        <h1 class="d-inline p-4">
            <b><i class="fas fa-calendar-alt"></i> @lang('navigation.event')</b>
        </h1>
    </div>
@php
    // Assuming you have access to the currently authenticated user
    $user = Auth::user();
@endphp

<<<<<<< Updated upstream
@if ($user && $user->uid !== null)
=======
@if ($user && $user->uid !== null && $user->memberships()->whereExists(function ($query) use ($user) {
    $query->select(DB::raw(1))
        ->from('users')
        ->join('memberships', 'memberships.user_id', '=', 'users.id')
        ->where('users.id', '=', $user->id, )
        ->whereDate('memberships.expired_at', '>=', now())
        ->whereRaw('memberships.id = (
            SELECT MAX(id) FROM memberships
            WHERE memberships.user_id = users.id
        )');
    })->exists())
>>>>>>> Stashed changes
    <div class="card p-3 m-4" style="border: none;">
        <div class="card-header" style="border-bottom: none;">
            <h4 class="d-inline pb-3">
                <b>@lang('events.plural-name')</b>
            </h4>
            <div class="card-header-actions">
                @can('create', \App\Models\Event::class)
                    <a href="{{ route('event.create') }}" class="btn btn-sm btn-success">
                        <i class="fas fa-plus"></i>
                        @lang('Create :resource', [
                            'resource' => trans('events.singular-name'),
                        ])
                    </a>
                @endcan
            </div>
        </div>

        <div class="card-body">
            {!! $dataTable->table() !!}
        </div>
    </div>
<<<<<<< Updated upstream
=======
@elseif ($user && $user->uid !== null && $user->memberships()->whereExists(function ($query) use ($user) {
    $query->select(DB::raw(1))
        ->from('users')
        ->join('memberships', 'memberships.user_id', '=', 'users.id')
        ->where('users.id', '=', $user->id)
        ->whereDate('memberships.expired_at', '<', now())
        ->whereRaw('memberships.id = (
            SELECT MAX(id) FROM memberships
            WHERE memberships.user_id = users.id
        )');
    })->exists())
    <div class="card p-3 m-4" style="border: none;">
        <div class="card-header" style="border: none;">
            <h4 class="d-inline pb-3">
                <b>{{ trans('verify-membership.title_expired') }}</b>
            </h4>
        </div>

        <div class="card-body">
            {{ trans('verify-membership.notice_1') }}
            {{ trans('verify-membership.notice_4') }},
            <a class="d-inline" href="{{ route('profile.edit') }}">
                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ trans('verify-membership.notice_5') }}</button>.
            </a>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <img class="img-fluid" src="{{ asset('/img/Feeling sorry-pana.svg') }}" style="width:35%;" alt="">
    </div>
>>>>>>> Stashed changes
@else
    <div class="card p-3 m-4" style="border: none;">
        <div class="card-header" style="border: none;">
            <h4 class="d-inline pb-3">
                <b>{{ trans('verify-membership.title') }}</b>
            </h4>
        </div>

        <div class="card-body">
            {{ trans('verify-membership.notice_1') }}
            {{ trans('verify-membership.notice_2') }},
            <a class="d-inline" href="{{ route('profile.edit') }}">
                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ trans('verify-membership.notice_3') }}</button>.
            </a>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <img class="img-fluid" src="{{ asset('/img/ID Card-amico.svg') }}" style="width:35%;" alt="">
    </div>
@endif

@endsection
@push('scripts')
    {!! $dataTable->scripts() !!}
@endpush
