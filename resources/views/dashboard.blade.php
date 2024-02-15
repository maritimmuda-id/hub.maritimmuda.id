@extends('layouts.panel')

@section('content')
    <div class="pt-4">
        <h1 class="d-inline p-4">
            <b><i class="fas fa-th-large"></i> @lang('navigation.overview')</b>
        </h1>
    </div>
    <div class="row mt-4 ml-4 mr-4 d-flex justify-content-between align-items-center">
        <div class="card mb-0 d-flex justify-content-between align-items-center" style="border: none; flex: 0 0 50%; max-width: 49%; background-color: #13abc3; color: white;">
            <div class="row col-15 col-lg-10 d-flex justify-content-between align-items-center">
                <div class="mt-5 mb-5 col-lg-7">
                    <h1 class="p-0 col-lg-10" style="font-size: 25px;">@lang('dashboard.welcome-label') <br><b>{{ Illuminate\Support\Str::limit(auth()->user()->name, 15, '...') }}! </b></h1>
                </div>
                <div class="p-3 d-sm-none d-md-block" style="width:40%; height:40%;">
                    <img src="{{ asset('/img/Welcome aboard-pana.svg') }}" alt="">
                </div>
            </div>
        </div>
        <div class="card mb-0 d-flex justify-content-between align-items-center" style="border: none; flex: 0 0 50%; max-width: 49%; background-color: #ffcb3d;">
            <div class="row col-15 col-lg-10 d-flex justify-content-between align-items-center">
                <div class="mt-5 mb-5 col-lg-7">
                    <h1 style="font-size: 25px;"><b>@lang('discount.discount-label')</b></h1>
                </div>
                <div class="p-3 d-sm-none d-md-block" style="width:40%; height:40%;">
                    <img src="{{ asset('/img/Discount-amico.svg') }}" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            @foreach ($widgets as $widget)
                <div class="col-6 col-lg-3">
                    <div class="card p-3 m-1" style="border: none;">
                        <div class="card-body p-3 align-items-center">
                            <div class="text-value text-center" style="font-size: 70px; color: #3c4b64;">{{ $widget['value'] }}</div>
                            <div class="text-muted text-uppercase font-weight-bold small text-center">{{ $widget['label'] }}
                            </div>
                        </div>
                        <div class="view-more px-3 py-2">
                            <a href="{{ $widget['action'] }}"
                                class="btn-block d-flex justify-content-between align-items-center">
                                <span class="small font-weight-bold">@lang('View More')</span>
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
