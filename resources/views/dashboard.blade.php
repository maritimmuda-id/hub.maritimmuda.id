@extends('layouts.panel')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                @foreach ($widgets as $widget)
                    <div class="col-6 col-lg-3">
                        <div class="card">
                            <div class="card-body p-3 d-flex align-items-center">
                                <div class="bg-gradient-primary p-3 mfe-3">
                                    <i class="{{ $widget['icon'] }} c-icon c-icon-xl"></i>
                                </div>
                                <div>
                                    <div class="text-value text-primary">{{ $widget['value'] }}</div>
                                    <div class="text-muted text-uppercase font-weight-bold small">{{ $widget['label'] }}
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer px-3 py-2">
                                <a href="{{ $widget['action'] }}"
                                    class="btn-block text-muted d-flex justify-content-between align-items-center">
                                    <span class="small font-weight-bold">@lang('View More')</span>
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
