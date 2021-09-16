@extends('layouts.panel')
@section('content')
    <div class="nav-tabs-boxed">
        @include('profile.includes.tabs')

        @livewire('achievement-history-card')
    </div>
@endsection
