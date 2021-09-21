@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card-group">
            <div class="card p-4">
                <div class="card-body">
                    <h2 class="mb-3">{{ trans('reset-password.heading') }}</h2>

                    @if (session()->has('status'))
                    <div class="alert alert-success" role="alert">
                        {!! session('status') !!}
                    </div>
                    @endif

                    <x-form :action="route('password.update')">
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                        <x-form-input name="email" :label="trans('forgot-password.email-label')"
                            :value="old('email', $request->email)" autocomplete="email" tabindex="1" />

                        <x-form-input type="password" name="password" :label="trans('reset-password.password-label')"
                            autocomplete="new-password" tabindex="2" autofocus />

                        <x-form-input type="password" name="password_confirmation"
                            :label="trans('reset-password.password-confirmation-label')" autocomplete="new-password"
                            tabindex="3" />

                        <div class="row">
                            <div class="col-6">
                                <button type="submit" tabindex="4" class="btn btn-primary px-4">
                                    {{ trans('reset-password.submit-button') }}
                                </button>
                            </div>
                        </div>
                    </x-form>
                </div>
            </div>
            <div class="card d-md-down-none" style="width:40%">
                <div class="card-body d-flex justify-content-center align-items-center">
                    <img class="img-fluid" src="{{ asset('/img/logo-300.png') }}" alt="" />
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
