<div class="card-body">
    <form class="row">
        <div class="col-md-3">
            <x-form-input
                name="search"
                wire:model="search"
                :placeholder="trans('member.filter-search-label')"
                :value="$search"
            />
        </div>
        <div class="col-md-3">
            <x-form-select name="province" wire:model="province">
                <option value="" disabled>@lang('member.filter-province-label')</option>
                <option value="">@lang('member.filter-province-placeholder')</option>
                @foreach ($provinces as $provinceId => $provinceName)
                    <option value="{{ $provinceId }}">
                        {{ $provinceName }}
                    </option>
                @endforeach
            </x-form-select>
        </div>
        <div class="col-md-3">
            <x-form-select name="expertise" wire:model="expertise">
                <option value="" disabled>@lang('member.filter-expertise-label')</option>
                <option value="">@lang('member.filter-expertise-placeholder')</option>
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
                            <img style="width:75px;height:100px;" class="img-fluid img-thumbnail" src="{{ $user->photo_link }}">
                            <div class="mx-2">
                                <h3>{{ $user->name }} @if ($user->uid !== null && $user->uid !== 'null') <i class="fas fa-check-circle" style="font-size: 20px; color: #39f;" title="@lang('profile.member-verify-check')"></i> @endif</h3>
                                <strong class="d-block">{{ $user->province->name }}</strong>
                                <small class="d-block">{{ $user->firstExpertise?->name }}</small>
                                <small class="d-block">{{ $user->secondExpertise?->name }}</small>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mr-2">
                            <button
                                wire:click.prevent="show('{{ $user->uuid }}')"
                                class="btn btn-info"
                            >
                                <i class="fas fa-info-circle"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-md-12">
                <h4>@lang('member.filter-no-results-text')</h4>
            </div>
        @endforelse
    </div>
    @if ($users?->hasMorePages())
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
                                        <div class="mt-3">
                                            <h4 id="name_1"></h4>
                                            <a id="email" class="mx-1">
                                                <i class="fas fa-envelope"></i>
                                            </a>
                                            <a id="instagram_profile" class="mx-1" target="_blank" rel="noopener">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                            <a id="linkedin_profile" class="mx-1" target="_blank" rel="noopener">
                                                <i class="fab fa-linkedin"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
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
                                        <div class="col-sm-12"><hr></div>
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">@lang('profile.province-label')</h6>
                                        </div>
                                        <div class="col-sm-9" id="province"></div>
                                        <div class="col-sm-12"><hr></div>
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">@lang('profile.first-expertise-id-label')</h6>
                                        </div>
                                        <div class="col-sm-9" id="first_expertise"></div>
                                        <div class="col-sm-12"><hr></div>
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">@lang('profile.second-expertise-id-label')</h6>
                                        </div>
                                        <div class="col-sm-9" id="second_expertise"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row gutters-sm">
                                <div class="col-sm-12">
                                    <div class="card h-100">
                                        <div class="card-body shadow">
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
                $('#uid').text(e.uid);
                if (e.uid !== null) {
                    $('#name_1').html(`${e.name} <i class="fas fa-check-circle" style="font-size: 20px; color: #39f;" title="@lang('profile.member-verify-check')"></i>`);
                } else {
                    $('#name_1').text(e.name)
                }
                $('#name_2').text(e.name);
                $('#email').attr('href', `mailto:${e.email}`);
                $('#bio').text(e.bio);
                $('#province').text(e.province);
                $('#first_expertise').text(e.first_expertise);
                $('#second_expertise').text(e.second_expertise);
                $('#linkedin_profile').hide();
                $('#instagram_profile').hide();
                if (e.linkedin_profile !== null) {
                    $('#linkedin_profile')
                        .attr('href', e.linkedin_profile)
                        .show();
                }
                if (e.instagram_profile !== null) {
                    $('#instagram_profile')
                        .attr('href', e.instagram_profile)
                        .show();
                }
                $('#photo_link').attr('src', e.photo_link);
                $('#userProfileModal').modal('show');
            });
        });
    </script>
@endpush
