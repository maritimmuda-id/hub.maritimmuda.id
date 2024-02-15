@extends('layouts.panel')
@section('content')
    <div class="pt-4">
        <h1 class="d-inline p-4">
            <b><i class="fas fa-money-bill-alt"></i> @lang('navigation.scholarship')</b>
        </h1>
    </div>
@php
    // Assuming you have access to the currently authenticated user
    $user = Auth::user();
@endphp

@if ($user && $user->uid !== null)
    <div class="card p-3 m-4" style="border: none;">
        <div class="card-header" style="border-bottom: none;">
            <h4 class="d-inline pb-3">
                <b>@lang('scholarships.plural-name')</b>
            </h4>
            <div class="card-header-actions">
                @can('create', \App\Models\Scholarship::class)
                    <a href="{{ route('scholarship.create') }}" class="btn btn-sm btn-success">
                        <i class="fas fa-plus"></i>
                        @lang('Create :resource', [
                            'resource' => trans('scholarships.singular-name')
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
