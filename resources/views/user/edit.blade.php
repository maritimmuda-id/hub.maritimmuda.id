@extends('layouts.panel')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="d-inline">
                @lang('Edit :resource', [
                    'resource' => trans('users.singular-name')
                ])
            </h4>
            <div class="card-header-actions">
                @can('viewAny', \App\Models\User::class)
                    <a href="{{ route('user.index') }}" class="btn btn-sm btn-secondary">
                        <i class="fas fa-arrow-left"></i>
                        @lang('Back')
                    </a>
                @endcan
            </div>
        </div>
        <x-form :action="route('user.update', $user)" method="patch" files>
            <div class="card-body">
                @bind($user)
                    <div class="row">
                        <div class="col-md-6">
                            <x-form-input
                                name="uid"
                                :label="trans('profile.uid-label')"
                                disabled
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
                                name="email"
                                disabled
                                :label="trans('profile.email-label')"
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
                                name="date_of_birth"
                                class="date"
                                :label="trans('profile.date-of-birth-label')"
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
    <div class="card-group mb-4">
        <div class="card">
            @livewire('identity-card-preview', [
                'user' => $user,
                'attributes' => [
                    'class' => 'card-img',
                ],
            ])
            {{-- <img class="card-img" src="{{ $user->identity_card_link }}" alt=""> --}}
        </div>
        <div class="card">
            <div class="card-header">
                <h4>@lang('membership.heading')</h4>
            </div>
            <div class="card-body">
                <dl class="row">
                    <dt class="col-sm-5">@lang('membership.member-age')</dt>
                    <dd class="col-sm-7">
                        @lang(':age years old', ['age' => $user->date_of_birth?->age ?? 0])
                    </dd>
                    <dt class="col-sm-5">@lang('membership.member-type')</dt>
                    <dd class="col-sm-7">
                        {{ $user->member_type }}
                    </dd>
                    <dt class="col-sm-5">@lang('membership.verified-date')</dt>
                    <dd class="col-sm-7">
                        {{ $user->membership?->verified_at?->format('d M Y') ?? '-' }}
                    </dd>
                    <dt class="col-sm-5">@lang('membership.expired-date')</dt>
                    <dd class="col-sm-7">
                        {{ $user->membership?->expired_at?->format('d M Y') ?? '-' }}
                    </dd>
                </dl>
            </div>
            <div class="card-footer">
                @can('verify-member', $user)
                    <x-form :action="route('user.verify', $user)" onsubmit="return confirm('{{ __('Are you sure?') }}');" style="display: inline-block;">
                        <button type="submit" class="btn btn-sm btn-primary" style="margin:1.25px 0;">
                            <i class="fas fa-user-check"></i>&nbsp;&nbsp;{{ __('membership.verify-and-generate-member-card') }}
                        </button>
                    </x-form>
                @endcan
                @if ($user->ha)

                @endif
            </div>
        </div>
    </div>
@endsection
