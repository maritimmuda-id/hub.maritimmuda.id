<div class="card-body">
    <form class="row">
        <div class="col-md-3">
            <x-form-input
                name="search"
                wire:model="search"
                :placeholder="trans('member.search-label')"
                :value="$search"
            />
        </div>
        <div class="col-md-3">
            <x-form-select name="province" wire:model="province">
                <option value="" disabled>@lang('member.province-label')</option>
                <option value="">@lang('member.province-placeholder')</option>
                @foreach ($provinces as $provinceId => $provinceName)
                    <option value="{{ $provinceId }}">
                        {{ $provinceName }}
                    </option>
                @endforeach
            </x-form-select>
        </div>
        <div class="col-md-3">
            <x-form-select name="expertise" wire:model="expertise">
                <option value="" disabled>@lang('member.expertise-label')</option>
                <option value="">@lang('member.expertise-placeholder')</option>
                @foreach ($expertises as $expertiseId => $expertiseName)
                    <option value="{{ $expertiseId }}">
                        {{ $expertiseName }}
                    </option>
                @endforeach
            </x-form-select>
        </div>
    </form>
    <div class="row">
        @forelse ($users as $user)
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body p-2 d-flex justify-content-between">
                        <div class="d-flex">
                            <img style="height:100px" class="img-fluid img-thumbnail" src="{{ $user->photo_thumb_link }}">
                            <div class="mx-2">
                                <h3>{{ $user->name }}</h3>
                                <strong class="d-block">{{ $user->province->name }}</strong>
                                <small class="d-block">{{ $user->firstExpertise?->name }}</small>
                                <small class="d-block">{{ $user->secondExpertise?->name }}</small>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mr-2">
                            <button wire:click="show('{{ $user->uuid }}')" class="btn btn-info">
                                <i class="fas fa-info-circle"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-md-12">
                <h4>@lang('member.no-results-text')</h4>
            </div>
        @endforelse
    </div>
    @if ($users)
        <div class="row">
            <div class="col-md-12">
                {!! $users->links() !!}
            </div>
        </div>
    @endif
    <div
        wire:ignore.self
        class="modal fade"
        id="userProfileModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="userProfileModalHeading"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="userProfileModalHeading">@lang('Detail')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true close-btn">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row gutters-sm">
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body shadow">
                                    <div class="d-flex flex-column align-items-center text-center">
                                        <img src="" alt="" id="photo_link" width="150">
                                    </div>
                                </div>
                            </div>
                            <div class="card mt-3">
                                <ul class="list-group list-group-flush shadow">
                                    <li id="instagram_profile_wrapper" class="list-group-item">
                                        <a id="instagram_profile" class="h6 mb-0" target="_blank" noreferrer>@lang('profile.instagram-profile-label')</a>
                                    </li>
                                    <li id="linkedin_profile_wrapper" class="list-group-item">
                                        <a id="linkedin_profile" class="h6 mb-0" target="_blank" noreferrer>@lang('profile.linkedin-profile-label')</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card mb-3">
                                <div class="card-body shadow">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">@lang('profile.name-label')</h6>
                                        </div>
                                        <div class="col-sm-9" id="name_2"></div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">@lang('profile.email-label')</h6>
                                        </div>
                                        <div class="col-sm-9">
                                            <a id="email"></a>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">@lang('profile.province-label')</h6>
                                        </div>
                                        <div class="col-sm-9" id="province"></div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">@lang('profile.first-expertise-id-label')</h6>
                                        </div>
                                        <div class="col-sm-9" id="first_expertise"></div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">@lang('profile.second-expertise-id-label')</h6>
                                        </div>
                                        <div class="col-sm-9" id="second_expertise"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row gutters-sm">
                                <div class="col-sm-12 mb-3">
                                    <div class="card h-100">
                                        <div class="card-body shadow">
                                            <h6 class="mb-2">@lang('profile.residence-address-label')</h6>
                                            <p class="mb-0" id="residence_address"></p>
                                            <hr>
                                            <h6 class="mb-2">@lang('profile.permanent-address-label')</h6>
                                            <p class="mb-0" id="permanent_address"></p>
                                            <hr>
                                            <h6 class="mb-2">@lang('profile.bio-label')</h6>
                                            <p class="mb-0" id="bio"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        $(function () {
            Livewire.on('openModal', (e) => {
                console.log(e);
                $('#name_1').text(e.name);
                $('#name_2').text(e.name);
                $('#email').text(e.email);
                $('#email').attr('href', `mailto:${e.email}`);
                $('#permanent_address').text(e.permanent_address);
                $('#residence_address').text(e.residence_address);
                $('#bio').text(e.bio);
                $('#province').text(e.province);
                $('#first_expertise').text(e.first_expertise);
                $('#second_expertise').text(e.second_expertise);
                $('#linkedin_profile_wrapper').hide();
                $('#instagram_profile_wrapper').hide();
                if (e.linkedin_profile !== null) {
                    $('#linkedin_profile').attr('href', e.linkedin_profile);
                    $('#linkedin_profile_wrapper').show();
                }
                if (e.instagram_profile !== null) {
                    $('#instagram_profile').attr('href', e.instagram_profile);
                    $('#instagram_profile_wrapper').show();
                }
                $('#photo_link').attr('src', e.photo_link);
                $('#userProfileModal').modal('show');
            });
        });
    </script>
@endpush
