@extends('layouts.panel')
@section('content')
    <div class="pt-4">
        <h1 class="d-inline p-4">
            <b><i class="fas fa-user-friends"></i> @lang('navigation.find-member')</b>
        </h1>
    </div>

    <div class="card p-3 m-4" style="border: none;">
        <div class="card-header" style="border-bottom: none;">
            <h4 class="d-inline pb-3">
                <b>@lang('profile.member-label')</b>
            </h4>
        </div>

        @livewire('find-member-card')
    </div>
@endsection
