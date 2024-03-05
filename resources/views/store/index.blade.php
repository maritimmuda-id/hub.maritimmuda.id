@extends('layouts.panel')
@section('content')
<script src="https://cdn.tailwindcss.com"></script>
<div class="px-4 lg:px-10 mx-auto w-full max-w-screen-xl">
    {{-- Produk --}}
    <section class="py-4 px-4">
        <div class="flex flex-wrap gap-5 mt-3 mb-8">
            <!-- Produk 1 -->
            <a href="#" class="w-full max-w-[150px] md:max-w-[220px] lg:max-w-[190px] xl:max-w-[256px] flex flex-col gap-2 pb-2 border border-indigo-50 shadow-lg shadow-indigo-100 overflow-hidden rounded-md pointer-events-none">
                <div class="w-full h-48 md:h-52 lg:h-50 opacity-50">
                    <img src="{{ asset('assets/img/img-product.png') }}" class="object-cover w-full h-48 md:h-72 lg:h-80" alt="...">
                </div>
                <div class="flex flex-col p-3 opacity-50">
                    <div class="w-fit text-slate-800 text-slate-800 text-sm font-medium mr-2 px 1 py-0.5 rounded">
                        Kategori 1
                    </div>
                    <div class="text-slate-900 line-clamp-1 sm:line-clamp-2">Produk 1</div>
                </div>
            </a>
            <!-- Produk 2 -->
            <a href="#" class="w-full max-w-[150px] md:max-w-[220px] lg:max-w-[190px] xl:max-w-[256px] flex flex-col gap-2 pb-2 border border-indigo-50 shadow-lg shadow-indigo-100 overflow-hidden rounded-md pointer-events-none">
                <div class="w-full h-48 md:h-52 lg:h-50 opacity-50">
                    <img src="{{ asset('assets/img/img-product.png') }}" class="object-cover w-full h-48 md:h-72 lg:h-80" alt="...">
                </div>
                <div class="flex flex-col p-3 opacity-50">
                    <div class="w-fit text-slate-800 text-slate-800 text-sm font-medium mr-2 px 1 py-0.5 rounded">
                        Kategori 2
                    </div>
                    <div class="text-slate-900 line-clamp-1 sm:line-clamp-2">Produk 2</div>
                </div>
            </a>
    </section>
</div>
@endsection
