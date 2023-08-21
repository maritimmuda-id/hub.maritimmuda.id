@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card-group">
            <div class="card mx-auto" style="width:40%">
                <div class="card-body d-flex justify-content-center align-items-center">
                    <img class="img-fluid" src="{{ asset('/img/logo-300.png') }}" alt="" />
                </div>
            </div>
            <div class="card p-4">
                <div class="card-body">
                    <h2 class="mb-3">{{ trans('login.heading') }}</h2>

                    @if (session()->has('status'))
                    <div class="alert alert-success" role="alert">
                        {!! session('status') !!}
                    </div>
                    @endif

                    <x-form :action="route('login')">
                        <x-form-input name="email" :label="trans('login.identifier-label')" autocomplete="email"
                            tabindex="1" autofocus />

                        <x-form-input type="password" name="password" :label="trans('login.password-label')"
                            autocomplete="current-password" tabindex="2" />

                        <div class="row mb-4">
                            <div class="col-6">
                                <x-form-checkbox name="remember" tabindex="3"
                                    :label="trans('login.remember-me-label')" />
                            </div>
                            <div class="col-6 text-right">
                                @if(Route::has('password.request'))
                                <a class="btn btn-link p-0" href="{{ route('password.request') }}" tabindex="5">
                                    {{ trans('login.forgot-password-cta') }}
                                </a>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <button type="submit" tabindex="4" class="btn btn-primary px-4">
                                    {{ trans('login.submit-button') }}
                                </button>
                            </div>
                            <div class="col-6 text-right">
                                @if(Route::has('register'))
                                <a class="btn btn-link my-1 p-0" href="{{ route('register') }}" tabindex="6">
                                    {{ trans('login.register-cta') }}
                                </a>
                                @endif
                            </div>
                        </div>
                    </x-form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
