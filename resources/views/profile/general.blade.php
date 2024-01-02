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
                                    <img src="{{ $user->getMemberCardPreview() }}" class="img-thumbnail img-fluid my-3" style="width:214px;height:135px;" alt="">
                                </div>
                                <div class="col-md-6 d-flex align-items-center">
                                    @if ($user->membership?->hasMemberCard())
                                        <a href="{{ $user->membership->member_card_document_link }}" target="_blank" class="btn btn-primary">
                                            @lang('profile.download-member-card')
                                        </a>
                                    @elseif ($user->hasMedia('payment_confirm') && $user->hasMedia('identity_card'))
                                        <button type="button" id="btn-member-card-processed" class="btn btn-primary">
                                            @lang('profile.create-member-card')
                                        </button>
                                    @elseif (!$user->hasMedia('payment_confirm'))
                                        <button type="button" id="btn-create-member-card-from-payment" class="btn btn-primary">
                                            @lang('profile.create-member-card')
                                        </button>
                                    @elseif (!$user->hasMedia('identity_card'))
                                        <button type="button" id="btn-create-member-card-from-identity" class="btn btn-primary">
                                            @lang('profile.create-member-card')
                                        </button>
                                    @endif
                                </div>

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
                                    @livewire('identity-card-preview', [
                                        'user' => $user,
                                        'attributes' => [
                                            'class' => 'img-thumbnail img-fluid my-3',
                                            'style' => 'width:214px;height:135px;',
                                        ],
                                    ])
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

                                <div class="col-md-6 d-flex justify-content-center">
                                    <img
                                        src="{{ $user->payment_link }}"
                                        class="img-thumbnail img-fluid my-3"
                                        style="width:214px;height:200px;"
                                        alt="payment_confirm"
                                    >
                                </div>
                                <div class="col-md-6 d-flex align-items-center">
                                    <x-form-input
                                        type="file"
                                        name="payment_confirm"
                                        class="w-100"
                                        :label="trans('profile.payment-label')"
                                    >
                                        <x-slot name="help">
                                            <small class="form-text text-muted">
                                                @lang('profile.payment-help-text')
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
                                        disabled
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
                    <div class="save-profile-btn">
                        <x-save-button />
                    </div>
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
@push('scripts')
    <script>
        $(function () {
            $('#btn-create-member-card-from-identity').on('click', function () {
                Swal.fire({
                    text: "{{ trans('profile.identity-card-is-required') }}",
                    showConfirmButton: true,
                    confirmButtonText: "{{ trans('profile.upload-identity-card') }}",
                    confirmButtonAriaLabel: "{{ trans('profile.upload-identity-card') }}",
                    showCancelButton: true,
                    cancelButtonText: "{{ __('Close') }}",
                    cancelButtonAriaLabel: "{{ __('Close') }}",
                    reverseButtons: true,
                    focusConfirm: false,
                    allowOutsideClick: false,
                    icon: "warning",
                })
                .then(result => {
                    if (result.isConfirmed) {
                        document.querySelector('[name="identity_card"]').addEventListener('change', function() {
                            $('.save-profile-btn .btn').click();
                        });
                        $('[name="identity_card"]').click();
                    }
                });
            });

            $('#btn-create-member-card-from-payment').on('click', function () {
                Swal.fire({
                    text: "{{ trans('profile.payment-is-required') }}",
                    showConfirmButton: true,
                    confirmButtonText: "{{ trans('profile.upload-payment-confirm') }}",
                    confirmButtonAriaLabel: "{{ trans('profile.upload-payment-confirm') }}",
                    showCancelButton: true,
                    cancelButtonText: "{{ __('Close') }}",
                    cancelButtonAriaLabel: "{{ __('Close') }}",
                    reverseButtons: true,
                    focusConfirm: false,
                    allowOutsideClick: false,
                    icon: "warning",
                    html: `
                        <div>
                            <p>{{ trans('profile.payment-is-required') }}</p><br>
                            <div style="background-color:yellow; padding:25px;">
                                <strike>{{ trans('profile.discon') }}</strike>
                                <b><h1>{{ trans('profile.price') }}</h1><b>
                            </div><br>
                            <b><h4>{{ trans('profile.maritimmuda-bank') }}</h4><b>
                            <h3>{{ trans('profile.maritimmuda-bank-id') }}</h3>
                        </div>
                    `,
                })
                .then(result => {
                    if (result.isConfirmed) {
                        document.querySelector('[name="payment_confirm"]').addEventListener('change', function() {
                            $('.save-profile-btn .btn').click();
                        });
                        $('[name="payment_confirm"]').click();
                    }
                });
            });

            $('#btn-member-card-processed').on('click', function () {
                Swal.fire({
                    text: "{{ trans('profile.member-card-is-being-processed') }}",
                    showConfirmButton: false,
                    showCancelButton: true,
                    cancelButtonText: "{{ __('Close') }}",
                    cancelButtonAriaLabel: "{{ __('Close') }}",
                    focusConfirm: false,
                    allowOutsideClick: false,
                    icon: "info",
                });
            });
        });
    </script>
@endpush
