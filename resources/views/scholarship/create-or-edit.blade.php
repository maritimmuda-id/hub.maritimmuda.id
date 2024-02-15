@extends('layouts.panel')
@section('content')
    <div class="pt-4">
        <h1 class="d-inline p-4">
            <b><i class="fas fa-edit"></i> @lang('scholarships.singular-name')</b>
        </h1>
    </div>

    <div class="card p-3 m-4" style="border: none;">
        <div class="card-header" style="border: none;">
            <h4 class="d-inline pb-3"><b>
                @if ($isOnCreateState)
                    @lang('Create :resource', [
                        'resource' => trans('scholarships.singular-name')
                    ])
                @else
                    @lang('Edit :resource', [
                        'resource' => trans('scholarships.singular-name')
                    ])
                @endif</b>
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
            <div class="card-footer" style="border: none;">
                <x-save-button />
            </div>
        </x-form>
    </div>
@endsection
