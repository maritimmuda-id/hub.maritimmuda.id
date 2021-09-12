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
                                        class="img-thumbnail img-fluid my-4"
                                        style="width:150px;height:200px;"
                                        alt=""
                                    >
                                </div>
                                <div class="col-md-6 d-flex align-items-center">
                                    <x-form-input
                                        type="file"
                                        name="photo"
                                        :label="trans('profile.photo-label')"
                                    />
                                </div>

                                <div class="col-md-6">
                                    <x-form-input
                                        name="name"
                                        :label="trans('profile.name-label')"
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
    </div>
@endsection
