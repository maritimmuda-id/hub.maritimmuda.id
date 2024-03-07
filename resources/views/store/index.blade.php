@extends('layouts.panel')
@section('content')
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
            <div class="w-full h-48 md:h-52 lg:h-50 opacity-50">
                @if ($item->image != '')
                <img src="{{ Storage::url('media/' . $item->image) }}"
                    class="object-cover w-full h-full"
                    alt="Gambar Produk {{ $item->name }}">
                @else
                    <img src="{{ Storage::url('media/' . $item->image) }}">
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
    </div>
</section>
</div>
@endsection
