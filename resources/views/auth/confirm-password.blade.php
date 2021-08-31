@extends('layouts.panel')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ trans('confirm-password.title') }}</div>
    
                    <div class="card-body">
                        <x-form :action="route('password.confirm')">
                            <x-form-input
                                type="password"
                                name="password"
                                :label="trans('confirm-password.password-label')"
                                autocomplete="current-password"
                                tabindex="1"
                                autofocus
                            />

                            <div class="row">
                                <div class="col-6">
                                    <button type="submit" tabindex="2" class="btn btn-primary px-4">
                                        {{ trans('confirm-password.submit-button') }}
                                    </button>
                                </div>
                            </div>
                        </x-form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
