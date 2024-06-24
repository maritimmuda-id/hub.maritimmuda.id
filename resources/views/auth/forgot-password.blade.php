@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card-group">
            <div class="card mx-auto" style="width:40%; border: none;">
                <div class="card-body d-flex justify-content-center align-items-center">
                    <img class="img-fluid pt-md-4 pb-md-4 pl-md-4" src="{{ asset('/img/logo-300.png') }}" alt="" />
                </div>
            </div>
            <div class="card p-4" style="border: none;">
                <div class="card-body">
                    <h2 class="mb-3"><b>{{ trans('forgot-password.heading') }}</b></h2>

                    @if (session()->has('status'))
                    <div class="alert alert-success" role="alert">
                        {!! session('status') !!}
                    </div>
                    @endif

                    <x-form :action="route('password.email')">
                        <x-form-input name="email" :label="trans('forgot-password.email-label')" autocomplete="email"
                            tabindex="1" autofocus />

                        <div class="row">
                            <div class="col-12">
                                <button type="submit" tabindex="2" class="btn btn-primary px-4">
                                    {{ trans('forgot-password.submit-button') }}
                                </button>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12 text-right">
                                @if(Route::has('login'))
                                <button type="button" class="btn btn-link my-1 p-0" tabindex="8" onclick="window.location='{{ route('login') }}'">
                                    {{ trans('login.backto-login') }}
                                </button>
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
