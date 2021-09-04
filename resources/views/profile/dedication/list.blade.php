@extends('layouts.panel')
@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="nav-tabs-boxed">
                @include('profile.includes.tabs')

                @livewire('dedication-card')
            </div>
        </div>
    </div>
@endsection
