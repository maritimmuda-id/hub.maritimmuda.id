@extends('layouts.panel')
@section('content')
@php
    // Assuming you have access to the currently authenticated user
    $user = Auth::user();
@endphp

@if ($user && $user->uid !== null)
    <div class="card">
        <div class="card-header">
            <h4 class="d-inline">
                @lang('job-posts.plural-name')
            </h4>
            <div class="card-header-actions">
                @can('create', \App\Models\JobPost::class)
                    <a href="{{ route('job-post.create') }}" class="btn btn-sm btn-success">
                        <i class="fas fa-plus"></i>
                        @lang('Create :resource', [
                            'resource' => trans('job-posts.singular-name')
                        ])
                    </a>
                @endcan
            </div>
        </div>

        <div class="card-body">
            {!! $dataTable->table() !!}
        </div>
    </div>
@else
    <div class="card">
        <div class="card-header">{{ trans('verify-membership.title') }}</div>

        <div class="card-body">
            {{ trans('verify-membership.notice_1') }}
            {{ trans('verify-membership.notice_2') }},
            <a class="d-inline" href="{{ route('profile.edit') }}">
                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ trans('verify-membership.notice_3') }}</button>.
            </a>
        </div>
    </div>
@endif

@endsection
@push('scripts')
    {!! $dataTable->scripts() !!}
@endpush
