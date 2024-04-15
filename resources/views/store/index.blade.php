@extends('layouts.panel')
@section('content')
<<<<<<< Updated upstream
<script src="https://cdn.tailwindcss.com"></script>
<section class="py-4 px-4">
    <div class="flex flex-col gap-3 sm:gap-0 sm:flex-row sm:justify-between sm:items-center">
        <div class="text-xl md:text-2xl font-bold text-slate-900">Produk</div>
        <div class="w-full max-w-sm lg:max-w-lg">
            {{-- search --}}
            <form action="{{ url('/search') }}" method="GET">
                <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input name="search" type="search" value="{{ Request::get('search') }}" id="default-search"
                        class="block w-full p-3 pl-5 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-indigo-500 focus:border-indigo-500"
                        placeholder="Cari produk impianmu..." required>
                    <button type="submit"
                        class="text-white absolute right-2.5 bottom-2.5 bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-4 py-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        <span class="sr-only">Search</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="flex flex-wrap gap-5 mt-3 mb-8">
        @foreach ($product as $item)
        <a href="{{$item->link}}" class="w-full max-w-[150px] md:max-w-[220px] lg:max-w-[190px] xl:max-w-[256px] flex flex-col gap-2 pb-2 border border-indigo-50 shadow-lg shadow-indigo-100 overflow-hidden rounded-md pointer-events-none">
            <div class="w-full h-48 md:h-52 lg:h-50">
                @if ($item->image != '')
                <img src="{{ asset('media/' . $item->image) }}"
                    class="object-cover w-full h-full"
                    alt="Gambar Produk {{ $item->name }}">
                @else 
                <img src="{{ asset('media/' . $item->image) }}">
                @endif
            </div>
            <div class="flex flex-col p-3">
                <div class="w-fit bg-purple-100 text-purple-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded">
                    {{ $item->category }}</div>
                <div class="text-slate-900 line-clamp-1 sm:line-clamp-2">{{ $item->name }}</div>
                <div class="text-slate-900 font-bold">Rp{{ number_format($item->price, 0, ',', '.') }}
                </div>
            </div>
        </a>
        @endforeach
=======
    <div class="pt-4">
        <h1 class="d-inline p-4">
            <b><i class="fas fa-shopping-cart"></i> @lang('navigation.product')</b>
        </h1>
    </div>
    <div class="card p-3 m-4" style="border: none;">
        <div class="card-header pb-0" style="border-bottom: none;">
            <h4 class="d-inline pb-3">
                <b>@lang('product.plural-name')</b>
            </h4>
            <div class="card-header-actions">
                @if(auth()->user()->is_admin)
                    <a href="{{ route('store.admin.index') }}" class="btn btn-sm btn-info">
                        <i class="fas fa-cog"></i> <span class="d-none d-sm-inline-block">@lang('product.product-setting')</span>
                    </a>
                @endif
            </div>
            <div class=" pl-0 pt-4 col-md-3">
                <form action="{{ route('search') }}" method="GET" id="searchForm">
                    <x-form-input type="search" name="search" id="default-search" placeholder="{{ __('product.filter-search-label') }}" value="{{ $search ?? '' }}" />
                    <!-- <button type="submit">Search</button> -->
                </form>
            </div>
            <!-- <script>
                document.getElementById('default-search').addEventListener('input', function() {
                    document.getElementById('searchForm').submit();
                });
            </script> -->
        </div>

        <section class="py-2 px-4">
            <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-4">
                @forelse ($product as $item) <!-- Use forelse to handle empty product array -->
                    <div class="col">
                        <div class="card border" style="border-radius: 15px;">
                            <img src="{{ asset('media/' . $item->image) }}" class="card-img-top" alt="Gambar Produk {{ $item->name }}" style="border-radius: 15px 15px 0 0;">
                            <div class="card-body">
                                <div class=" p-1" style="display: inline-block; border-radius: 8px; background-color: #f1d6ff; color: #580980">{{ $item->category }}</div>
                                <h5 class="card-title pt-2 mb-1">{{ $item->name }}</h5>
                                <h6 class="card-text"><b>Rp{{ number_format($item->price, 0, ',', '.') }}</b></h6>
                                <a href="{{$item->link}}" target="_blank" class="btn btn-success p-2">
                                    @lang('product.button')
                                </a>
                            </div>
                        </div>
                    </div>
                @empty <!-- Display a message if there are no products -->
                    <div class="col">
                        <p>No products found.</p>
                    </div>
                @endforelse
            </div>
        </section>
>>>>>>> Stashed changes
    </div>
@endsection
