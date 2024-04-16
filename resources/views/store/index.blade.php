@extends('layouts.panel')
@section('content')
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
    </div>
@endsection
