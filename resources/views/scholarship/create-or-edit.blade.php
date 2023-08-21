@extends('layouts.panel')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="d-inline">
                @if ($isOnCreateState)
                    @lang('Create :resource', [
                        'resource' => trans('scholarships.singular-name')
                    ])
                @else
                    @lang('Edit :resource', [
                        'resource' => trans('scholarships.singular-name')
                    ])
                @endif
            </h4>
            <div class="card-header-actions">
                @can('viewAny', \App\Models\Scholarship::class)
                    <a href="{{ route('scholarship.index') }}" class="btn btn-sm btn-secondary">
                        <i class="fas fa-arrow-left"></i>
                        @lang('Back')
                    </a>
                @endcan
            </div>
        </div>
        <x-form :action="$action" :method="$method ?? 'post'" files>
            <div class="card-body">
                @bind($scholarship)
                    <div class="row">
                        <div class="col-md-6">
                            <x-form-input
                                name="name"
                                :label="trans('scholarships.name-label')"
                            />
                        </div>
                        <div class="col-md-6">
                            <x-form-input
                                name="provider_name"
                                :label="trans('scholarships.provider-name-label')"
                            />
                        </div>
                        <div class="col-md-6">
                            <x-form-input
                                name="registration_link"
                                :label="trans('scholarships.registration-link-label')"
                            />
                        </div>
                        <div class="col-md-6">
                            <x-form-input
                                name="submission_deadline"
                                class="date"
                                :label="trans('scholarships.submission-deadline-label')"
                            />
                        </div>
                        <div class="col-md-6">
                            <x-form-input
                                name="poster"
                                type="file"
                                :label="trans('scholarships.poster-label')"
                            />
                        </div>
                    </div>
                @endbind
            </div>
            <div class="card-footer">
                <x-save-button />
            </div>
        </x-form>
    </div>
@endsection
