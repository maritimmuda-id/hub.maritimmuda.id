@extends('layouts.panel')
@section('content')
    <div class="pt-4">
        <h1 class="d-inline p-4">
            <b><i class="fas fa-edit"></i> @lang('events.singular-name')</b>
        </h1>
    </div>

    <div class="card p-3 m-4" style="border: none;">
        <div class="card-header" style="border: none;">
            <h4 class="d-inline pb-3"><b>
                @if ($isOnCreateState)
                    @lang('Create :resource', [
                        'resource' => trans('events.singular-name')
                    ])
                @else
                    @lang('Edit :resource', [
                        'resource' => trans('events.singular-name')
                    ])
                @endif</b>
            </h4>
            <div class="card-header-actions">
                @can('viewAny', \App\Models\Event::class)
                    <a href="{{ route('event.index') }}" class="btn btn-sm btn-secondary">
                        <i class="fas fa-arrow-left"></i>
                        @lang('Back')
                    </a>
                @endcan
            </div>
        </div>
        <x-form :action="$action" :method="$method ?? 'post'" files>
            <div class="card-body">
                @bind($event)
                    <div class="row">
                        <div class="col-md-6">
                            <x-form-input
                                name="name"
                                :label="trans('events.name-label')"
                            />
                        </div>
                        <div class="col-md-6">
                            <x-form-input
                                name="organizer_name"
                                :label="trans('events.organizer-name-label')"
                            />
                        </div>
                        <div class="col-md-6">
                            <x-form-input
                                name="external_url"
                                :label="trans('events.external-url-label')"
                            />
                        </div>
                        <div class="col-md-6">
                            <x-form-select
                                name="type"
                                :options="\App\Enums\EventType::asSelectArray()"
                                :label="trans('events.type-label')"
                            />
                        </div>
                        <div class="col-md-6">
                            <x-form-input
                                name="start_date"
                                class="datetime"
                                :label="trans('events.start-date-label')"
                            />
                        </div>
                        <div class="col-md-6">
                            <x-form-input
                                name="end_date"
                                class="datetime"
                                :label="trans('events.end-date-label')"
                            />
                        </div>
                        <div class="col-md-6">
                            <x-form-input
                                name="poster"
                                type="file"
                                :label="trans('events.poster-label')"
                            />
                        </div>
                    </div>
                @endbind
            </div>
            <div class="card-footer" style="border: none;">
                <x-save-button />
            </div>
        </x-form>
    </div>
@endsection
