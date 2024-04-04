@extends('layouts.panel')
@section('content')
    <div class="pt-4">
        <h1 class="d-inline p-4">
            <b><i class="fas fa-edit"></i> @lang('membership.head-membership')</b>
        </h1>
    </div>

    <div class="card p-3 m-4" style="border: none;">
        <div class="card-header" style="border: none;">
            <h4 class="d-inline pb-3">
                <b>@lang('membership.singular-name')</b>
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
                        @if(auth()->user()->is_admin == 2 || auth()->user()->is_admin == 3)
                            <div class="col-md-6">
                                <x-form-input
                                    name="uid"
                                    :label="trans('profile.uid-label')"
                                />
                            </div>
                        @elseif(auth()->user()->is_admin == 1)
                            <div class="col-md-6">
                                <x-form-input
                                    name="uid"
                                    disabled
                                    :label="trans('profile.uid-label')"
                                />
                            </div>
                        @endif                                           
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
            <div class="card-footer" style="border: none;">
                <x-save-button />
            </div>
        </x-form>
    </div>
    <div class="card-group mb-4 mr-4 ml-4">
        <div class="card p-3 mr-4" style="border: none; border-radius: 15px;">
            @livewire('identity-card-preview', [
                'user' => $user,
                'attributes' => [
                    'class' => 'card-img',
                ],
            ])
        </div>
        <div class="card p-3" style="border: none; border-radius: 15px;">
            <div class="card-header" style="border: none;">
                <h4 class="d-inline pb-3">
                    <b>@lang('membership.heading')</b>
                </h4>
            </div>
            <div class="card-body">
                <div class="card p-3">
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
            </div>
            <div class="card-footer" style="border: none;">
                @if (!App\Models\Membership::where('user_id', $user->id)->exists())
                    @can('verify-member', $user)
                        <x-form :action="route('user.verify', $user)" onsubmit="return confirm('{{ __('Are you sure?') }}');" style="display: inline-block;">
                            <button type="submit" class="btn btn-sm btn-primary" style="margin:1.25px 0;">
                                <i class="fas fa-user-check"></i>&nbsp;&nbsp;{{ __('membership.verify-and-generate-member-card') }}
                            </button>
                        </x-form>
                    @endcan
                @else
                    <x-form :action="route('user.verify', $user)" onsubmit="return confirm('{{ __('Are you sure?') }}');" style="display: inline-block;">
                        <button type="submit" class="btn btn-sm btn-primary" style="margin:1.25px 0;">
                            <i class="fas fa-user-check"></i>&nbsp;&nbsp;{{ __('membership.regenerate-member-card') }}
                        </button>
                    </x-form>
                @endif
                <button type="button" class="btn btn-sm btn-dark" data-toggle="modal" data-target="#emailModal">
                    <i class="fas fa-envelope"></i>&nbsp;&nbsp;{{ __('membership.button-text-mail') }}
                </button>
                <div class="modal fade" id="emailModal" tabindex="-1" role="dialog" aria-labelledby="emailModalLabel" aria-hidden="true" data-backdrop="static">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content" style="border: none; border-radius: 15px;">
                            <div class="modal-header">
                                <h5 class="modal-title" id="emailModalLabel">{{ __('membership.heading-text-mail') }}</h5>
                            </div>
                            <div class="modal-body">
                                <form id="emailForm" action="{{ route('send.email') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        @bind($user)
                                            <x-form-input id="user_email" name="email" disabled :label="trans('profile.email-label')"/>
                                        @endbind
                                        <label for="subjectMessage">{{ __('membership.subject-text-mail') }}</label>
                                        <input class="form-control" id="subjectMessage" name="subject-message" rows="4" required></input>
                                        <label for="emailMessage">{{ __('membership.text-mail') }}</label>
                                        <textarea class="form-control" id="emailMessage" name="message" rows="4" required></textarea>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" id="cancelButton" class="btn btn-secondary" data-dismiss="modal">{{ __('membership.cancel-text-mail') }}</button>
                                <button type="submit" form="emailForm" id="sendButton" class="btn btn-primary">{{ __('membership.confirm-text-mail') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@^10"></script>
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script>
                    $(document).ready(function() {
                        // Fungsi untuk menampilkan pesan sukses
                        function showSuccessMessage(email) {
                            Swal.fire({
                                title: 'Email berhasil terkirim!',
                                text: email,
                                timer: 5000,
                                showConfirmButton: false,
                                showCloseButton: true,
                                toast: true,
                                icon: 'success',
                                position: 'top-end'
                            });
                        }
                
                        // Handler untuk mengirim email
                        @if(session('email_sent'))
                            var userEmail = $('#user_email').val(); // Mengambil nilai email dari session
                            showSuccessMessage(userEmail);
                        @endif
                    });
                </script>                                
                <script>
                    // Menonaktifkan tombol setelah diklik
                    function disableButtons() {
                        var sendButton = document.getElementById("sendButton");
                        var cancelButton = document.getElementById("cancelButton");
                        
                        sendButton.disabled = true;
                        cancelButton.disabled = true;
                        
                        sendButton.classList.add("disabled");
                        cancelButton.classList.add("disabled");
                    }

                    // Menonaktifkan tombol setelah form terkirim
                    document.getElementById("emailForm").addEventListener("submit", function () {
                        disableButtons();
                    });
                </script>
            </div>
        </div>
    </div>
@endsection
