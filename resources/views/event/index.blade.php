@extends('layouts.panel')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="d-inline">
                @lang('events.plural-name')
            </h4>
            <div class="card-header-actions">
                @can('create', \App\Models\Event::class)
                    <a href="{{ route('event.create') }}" class="btn btn-sm btn-success">
                        <i class="fas fa-plus"></i>
                        @lang('Create :resource', [
                            'resource' => trans('events.singular-name')
                        ])
                    </a>
                @endcan
            </div>
        </div>

        <div class="card-body">
            {!! $dataTable->table() !!}
        </div>
    </div>
@endsection
@push('scripts')
    {!! $dataTable->scripts() !!}
@endpush
