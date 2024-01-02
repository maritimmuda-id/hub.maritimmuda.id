@extends('layouts.panel')
@section('content')
    <div class="card">
        <div class="card-header">
            @lang('profile.member-label')
        </div>

        @livewire('find-member-card')
    </div>
@endsection
