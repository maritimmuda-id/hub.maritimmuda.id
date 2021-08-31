@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card-group">
                <div class="card p-4">
                    <div class="card-body">
                        <h2 class="mb-3">{{ trans('register.heading') }}</h2>

                        <x-form :action="route('register')">
                            <div class="row">
                                <div class="col-md-6">
                                    <x-form-input
                                        name="name"
                                        :label="trans('register.name-label')"
                                        autocomplete="name"
                                        tabindex="1"
                                        autofocus
                                    />
                                </div>
                                <div class="col-md-6">
                                    <x-form-input
                                        name="email"
                                        :label="trans('register.email-label')"
                                        autocomplete="email"
                                        tabindex="2"
                                    />
                                </div>
                                <div class="col-md-6">
                                    <x-form-select
                                        name="gender"
                                        :label="trans('register.gender-label')"
                                        :options="\App\Enums\Gender::asSimpleSelectArray()"
                                        tabindex="3"
                                    />
                                </div>
                                <div class="col-md-6">
                                    <x-form-input
                                        type="password"
                                        name="password"
                                        :label="trans('register.password-label')"
                                        autocomplete="new-password"
                                        tabindex="4"
                                    />
                                </div>
                                <div class="col-md-6">
                                    <x-form-input
                                        type="password"
                                        name="password_confirmation"
                                        :label="trans('register.password-confirmation-label')"
                                        autocomplete="new-password"
                                        tabindex="5"
                                    />
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-6">
                                    <button type="submit" tabindex="6" class="btn btn-primary px-4">
                                        {{ trans('register.submit-button') }}
                                    </button>
                                </div>
                                <div class="col-6 text-right">
                                    @if(Route::has('login'))
                                        <a class="btn btn-link my-1 p-0" href="{{ route('login') }}" tabindex="7">
                                            {{ trans('register.login-cta') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </x-form>
                    </div>
                </div>
                <div class="card d-md-down-none" style="width:40%">
                    <div class="card-body d-flex justify-content-center align-items-center">
                        <img class="img-fluid" src="https://res.cloudinary.com/zhanang19/image/upload/q_auto:eco,c_scale,w_300/v1630384690/11_nr53qu.png" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
