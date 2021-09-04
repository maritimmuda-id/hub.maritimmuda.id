@extends('layouts.panel')
@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="nav-tabs-boxed">
                @include('profile.includes.tabs')

                @livewire('work-experience-card')
            </div>
        </div>
    </div>
@endsection