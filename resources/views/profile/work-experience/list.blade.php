@extends('layouts.panel')
@section('content')
    <div class="nav-tabs-boxed">
        @include('profile.includes.tabs')

        @livewire('work-experience-card')
    </div>
@endsection
