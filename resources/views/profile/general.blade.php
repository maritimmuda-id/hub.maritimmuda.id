@extends('layouts.panel')
@section('content')
    <div class="nav-tabs-boxed">
        @include('profile.includes.tabs')

        <div class="card">
            <x-form :action="route('profile.update')" method="patch" files>
                <div class="card-body row">
                    @bind($user)
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6 d-flex justify-content-center">
                                    <img
                                        src="{{ $user->photo_link }}"
                                        class="img-thumbnail img-fluid my-3"
                                        style="width:150px;height:200px;"
                                        alt=""
                                    >
                                </div>
                                <div class="col-md-6 d-flex align-items-center">
                                    <x-form-input
                                        type="file"
                                        name="photo"
                                        class="w-100"
                                        :label="trans('profile.photo-label')"
                                    >
                                        <x-slot name="help">
                                            <small class="form-text text-muted">
                                                @lang('profile.photo-help-text')
                                            </small>
                                        </x-slot>
                                    </x-form-input>
                                </div>

                                <div class="col-md-6 d-flex justify-content-center">
                                    <img
                                        src="{{ $user->identity_card_link }}"
                                        class="img-thumbnail img-fluid my-3"
                                        style="width:214px;height:135px;"
                                        alt=""
                                    >
                                </div>
                                <div class="col-md-6 d-flex align-items-center">
                                    <x-form-input
                                        type="file"
                                        name="identity_card"
                                        :label="trans('profile.identity-card-label')"
                                    >
                                        <x-slot name="help">
                                            <small class="form-text text-muted">
                                                @lang('profile.identity-card-help-text', [
                                                    'href' => 'https://www.instagram.com/p/CTPPBLLhtVr/'
                                                ])
                                            </small>
                                        </x-slot>
                                    </x-form-input>
                                </div>

                                <div class="col-md-6">
                                    <x-form-input
                                        name="name"
                                        :label="trans('profile.name-label')"
                                    />
                                </div>
                                <div class="col-md-6">
                                    <x-form-input
                                        name="email"
                                        :label="trans('profile.email-label')"
                                        disabled
                                    />
                                </div>
                                <div class="col-md-6">
                                    <x-form-select
                                        name="gender"
                                        :options="\App\Enums\Gender::asSimpleSelectArray()"
                                        :label="trans('profile.gender-label')"
                                    />
                                </div>
                                <div class="col-md-6">
                                    <x-form-select
                                        name="province_id"
                                        :options="$provinces"
                                        :label="trans('profile.province-label')"
                                    />
                                </div>
                                <div class="col-md-6">
                                    <x-form-input
                                        name="place_of_birth"
                                        :label="trans('profile.place-of-birth-label')"
                                    />
                                </div>
                                <div class="col-md-6">
                                    <x-form-input
                                        class="date"
                                        name="date_of_birth"
                                        :label="trans('profile.date-of-birth-label')"
                                    />
                                </div>
                                <div class="col-md-6">
                                    <x-form-input
                                        name="linkedin_profile"
                                        :label="trans('profile.linkedin-profile-label')"
                                    />
                                </div>
                                <div class="col-md-6">
                                    <x-form-input
                                        name="instagram_profile"
                                        :label="trans('profile.instagram-profile-label')"
                                    />
                                </div>
                                <div class="col-md-6">
                                    <x-form-select
                                        name="first_expertise_id"
                                        :options="$expertises"
                                        :label="trans('profile.first-expertise-id-label')"
                                    />
                                </div>
                                <div class="col-md-6">
                                    <x-form-select
                                        name="second_expertise_id"
                                        :options="$expertises"
                                        :label="trans('profile.second-expertise-id-label')"
                                    />
                                </div>
                                <div class="col-md-6">
                                    <x-form-textarea
                                        name="permanent_address"
                                        rows="5"
                                        :label="trans('profile.permanent-address-label')"
                                    >
                                        <x-slot name="help">
                                            <small class="form-text text-muted">
                                                @lang('profile.permanent-address-help-text')
                                            </small>
                                        </x-slot>
                                    </x-form-textarea>
                                </div>
                                <div class="col-md-6">
                                    <x-form-textarea
                                        name="residence_address"
                                        rows="5"
                                        :label="trans('profile.residence-address-label')"
                                    >
                                        <x-slot name="help">
                                            <small class="form-text text-muted">
                                                @lang('profile.residence-address-help-text')
                                            </small>
                                        </x-slot>
                                    </x-form-textarea>
                                </div>
                                <div class="col-md-12">
                                    <x-form-textarea
                                        name="bio"
                                        rows="5"
                                        :label="trans('profile.bio-label')"
                                    />
                                </div>
                            </div>
                        </div>
                    @endbind
                </div>
                <div class="card-footer">
                    <x-save-button />
                </div>
            </x-form>
        </div>

        <div class="card">
            <div class="card-header">
                @lang('profile.change-password-header')
            </div>
            <x-form :action="route('profile.change-password')" method="patch">
                <div class="card-body row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-8">
                                <x-form-input
                                    name="current_password"
                                    type="password"
                                    :label="trans('profile.current-password-label')"
                                />
                            </div>
                            <div class="col-md-8">
                                <x-form-input
                                    name="new_password"
                                    type="password"
                                    :label="trans('profile.new-password-label')"
                                />
                            </div>
                            <div class="col-md-8">
                                <x-form-input
                                    name="new_password_confirmation"
                                    type="password"
                                    :label="trans('profile.new-password-confirmation-label')"
                                />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <x-save-button />
                </div>
            </x-form>
        </div>
    </div>
@endsection
