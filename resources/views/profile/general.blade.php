@extends('layouts.panel')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        @lang('profile.heading')
                    </div>

                    <x-form :action="route('profile.update')" method="patch" files>
                        <div class="card-body row">
                            @bind($user)
                                <div class="col-md-8">
                                    <x-form-input
                                        name="name"
                                        :label="trans('profile.name-label')"
                                    />
                                    <x-form-input
                                        name="email"
                                        :label="trans('profile.email-label')"
                                        disabled
                                    />
                                </div>
                            @endbind
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-sm btn-primary" type="submit">
                                @lang('global.save')
                            </button>
                        </div>
                    </x-form>
                </div>
            </div>
        </div>
    </div>
@endsection
