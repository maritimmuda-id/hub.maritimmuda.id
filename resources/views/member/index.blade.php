@extends('layouts.panel')
@section('content')
    <div class="card">
        <div class="card-header">
            Member
        </div>

        @livewire('find-member-card')
    </div>
@endsection
@push('styles')
    @livewireStyles
@endpush
@push('scripts')
    @livewireScripts
@endpush
