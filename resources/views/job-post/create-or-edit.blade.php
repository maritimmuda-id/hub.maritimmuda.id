@extends('layouts.panel')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="d-inline">
                @if ($isOnCreateState)
                    @lang('Create :resource', [
                        'resource' => trans('job-posts.singular-name')
                    ])
                @else
                    @lang('Edit :resource', [
                        'resource' => trans('job-posts.singular-name')
                    ])
                @endif
            </h4>
            <div class="card-header-actions">
                @can('viewAny', \App\Models\JobPost::class)
                    <a href="{{ route('job-post.index') }}" class="btn btn-sm btn-secondary">
                        <i class="fas fa-arrow-left"></i>
                        @lang('Back')
                    </a>
                @endcan
            </div>
        </div>
        <x-form :action="$action" :method="$method ?? 'post'" files>
            <div class="card-body">
                @bind($jobPost)
                    <div class="row">
                        <div class="col-md-6">
                            <x-form-input
                                name="position_title"
                                :label="trans('job-posts.position-title-label')"
                            />
                        </div>
                        <div class="col-md-6">
                            <x-form-input
                                name="company_name"
                                :label="trans('job-posts.company-name-label')"
                            />
                        </div>
                        <div class="col-md-6">
                            <x-form-input
                                name="link"
                                :label="trans('job-posts.link-label')"
                            />
                        </div>
                        <div class="col-md-6">
                            <x-form-select
                                name="type"
                                :options="\App\Enums\JobType::asSelectArray()"
                                :label="trans('job-posts.type-label')"
                            />
                        </div>
                        <div class="col-md-6">
                            <x-form-input
                                name="application_closed_at"
                                class="date"
                                :label="trans('job-posts.application-closed-at-label')"
                            />
                        </div>
                        <div class="col-md-6">
                            <x-form-input
                                name="poster"
                                type="file"
                                :label="trans('job-posts.poster-label')"
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
