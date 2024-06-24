@extends('layouts.panel')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
<style>
    .card-img-top-fixed {
        width: 100%; /* Ensure it takes the full width of the card */
        height: 250px; /* Set a fixed height */
        object-fit: cover; /* Ensure the image covers the box while maintaining aspect ratio */
    }
</style>
<div class="pt-4">
    <h1 class="d-inline p-4">
        <b><i class="fas fa-laptop-code"></i> @lang('navigation.developer')</b>
    </h1>
</div>
<div class="card p-3 m-4" style="border: none;">
    <div class="card-header pb-0" style="border-bottom: none;">
        <h4 class="d-inline pb-3">
            <b>@lang('developer.github-repo')</b>
        </h4>
        <div class="pl-0 pt-4">
            <p>- Maritim Muda Nusantara (maritimmuda.id): <a href="https://github.com/maritimmuda-id/maritimmuda.id" target="_blank">https://github.com/maritimmuda-id/maritimmuda.id</a></p>
            <p>- Hub Maritim Muda (hub.maritimmuda.id): <a href="https://github.com/maritimmuda-id/hub.maritimmuda.id" target="_blank">https://github.com/maritimmuda-id/hub.maritimmuda.id</a></p>
        </div>
    </div>
</div>

<section class="py-1 py-md-2 text-center">
    <div class="mb-4">
        <div class="text-lg sm:text-xl font-bold text-dark">Introducing to our developer</div>
        <div class="d-flex justify-content-center align-items-center w-100 mt-2">
            <hr class="w-25 bg-primary">
            <div class="px-2">
                <i class="bi bi-caret-down-fill text-primary"></i>
            </div>
            <hr class="w-25 bg-primary">
        </div>
    </div>

    <div class="row row-cols-1 row-cols-md-5 g-4 ml-2 mr-2">
        @foreach ($developers as $developer)
        <div class="col">
            <div class="card border-0">
                <img src="{{ asset('media/' . $developer->image) }}" class="card-img-top card-img-top-fixed" alt="{{ $developer->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $developer->name }}</h5>
                    <p class="badge
                        @if ($developer->role == 'maritimmuda.id')
                            bg-secondary text-dark
                        @elseif($developer->role == 'geoparksyouth.net')
                            bg-warning text-dark
                        @elseif($developer->role == 'becdex.com')
                            bg-primary text-light
                        @elseif($developer->role == 'geomuda.id')
                            bg-danger text-light
                        @elseif($developer->role == 'iyel.or.id')
                            
                        @elseif($developer->role == 'theblueeconomist.org')
                            bg-dark text-light
                        @elseif($developer->role == 'ibec.stei.ac.id')
                            bg-success text-light
                        @elseif($developer->role == 'nexgen')
                            bg-purple text-light
                        @endif
                        ">
                        {{ $developer->role }}
                    </p>
                    <ul class="list-inline mt-2 mb-0">
                        <li class="list-inline-item"><a href="{{ $developer->github_link }}" target="_blank"><i class="bi bi-github"></i></a></li>
                        <li class="list-inline-item"><a href="{{ $developer->instagram_link }}" target="_blank"><i class="bi bi-instagram"></i></a></li>
                        <li class="list-inline-item"><a href="{{ $developer->linkedin_link }}" target="_blank"><i class="bi bi-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        @endforeach
    </div> 
</section>
@endsection
