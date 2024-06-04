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
        <div class="col-md-3">
            <x-form-select name="orderBy" wire:model="orderBy">
                <option value="" disabled>@lang('member.filter-newold-label')</option>
                <option value="desc">@lang('member.filter-new')</option>
                <option value="asc">@lang('member.filter-old')</option>
            </x-form-select>
        </div>
    </form>
    <div class="row">
        @forelse ($users as $user)
            @if ($user->is_admin != 3)
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body p-2 d-flex justify-content-between">
                            <div class="d-flex">
                                <img style="width:75px;height:100px;" class="img-fluid img-thumbnail" src="{{ $user->photo_link }}">
                                <div class="mx-2">
                                    <h3>{{ $user->name }}
                                        @if ($user && $user->uid !== null && $user->memberships()->whereExists(function ($query) use ($user) {
                                            $query->select(DB::raw(1))
                                                ->from('users')
                                                ->join('memberships', 'memberships.user_id', '=', 'users.id')
                                                ->where('users.id', '=', $user->id)
                                                ->whereDate('memberships.expired_at', '>=', now())
                                                ->whereRaw('memberships.id = (
                                                    SELECT MAX(id) FROM memberships
                                                    WHERE memberships.user_id = users.id
                                                )');
                                            })->exists())
                                            <i class="fas fa-check-circle" style="font-size: 20px; color: #0c6c9d;" title="@lang('profile.member-verify-check')"></i>
                                        @endif
                                        @if ($user->is_admin == 1)
                                            <i class="fas fa-key" style="font-size: 20px; color: #ffcb3d;" title="@lang('profile.member-admin-check')"></i>
                                        @endif
                                        @if ($user->is_admin == 2)
                                            <i class="fas fa-code" style="font-size: 20px; color: #d95353;" title="@lang('profile.member-developer-check')"></i>
                                        @endif
                                    </h3>
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
            @endif
        @empty
            <div class="col-md-12">
                <h4>@lang('member.filter-no-results-text')</h4>
            </div>
        @endforelse
    </div>
    @if ($users->hasMorePages() || !$users->isEmpty())
        <div class="row">
            <div class="col-md-12">
                {!! $users->onEachSide(1)->links() !!}
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
            <div class="modal-content" style="border-radius: 15px; border: none;">
                <div class="modal-header">
                    <h4 class="modal-title" id="userProfileModalHeading">
                        <b><i class="fas fa-info-circle"></i> @lang('Detail')</b>
                    </h4>
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
    <div class="modal" id="membershipModal-perpanjangan" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="border-radius: 15px; border: none;">
                <div class="modal-header">
                    <b>@lang('verify-membership.title_expired')</b>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @lang('verify-membership.notice_4'), <a href="{{ route('profile.edit') }}">@lang('verify-membership.notice_6')</a>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="membershipModal-buatKTA" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="border-radius: 15px; border: none;">
                <div class="modal-header">
                    <b>@lang('verify-membership.title')</b>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @lang('verify-membership.notice_2'), <a href="{{ route('profile.edit') }}">@lang('verify-membership.notice_3')</a>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        // $(function () {
        //     Livewire.on('openModal', (e) => {
        //         $('#uid').text(e.uid);
        //         var iconsHtml = `${e.name}`;

        //         if (e.memberships && e.memberships.length > 0) {
        //             var currentDate = new Date();
        //             var activeMembership = e.memberships.find(membership => {
        //                 var expiredDate = new Date(membership.expired_at);
        //                 // Check if expired_at is today or after today
        //                 return expiredDate >= currentDate.setDate(currentDate.getDate() - 1);
        //             });
        //             if (activeMembership) {
        //                 iconsHtml += ` <i class="fas fa-check-circle" style="font-size: 20px; color: #0c6c9d;" title="@lang('profile.member-verify-check')"></i>`;
        //             }
        //         }
        //         if (e.is_admin == 1) {
        //             iconsHtml += ` <i class="fas fa-key" style="font-size: 20px; color: #ffcb3d;" title="@lang('profile.member-admin-check')"></i>`;
        //         }
        //         if (e.is_admin == 2) {
        //             iconsHtml += ` <i class="fas fa-code" style="font-size: 20px; color: #d95353;" title="@lang('profile.member-developer-check')"></i>`;
        //         }
        //         $('#name_1').html(iconsHtml);
        //         $('#name_2').text(e.name);
        //         $('#email').attr('href', `mailto:${e.email}`);
        //         $('#bio').text(e.bio);
        //         $('#province').text(e.province);
        //         $('#first_expertise').text(e.first_expertise);
        //         $('#second_expertise').text(e.second_expertise);
        //         $('#linkedin_profile').hide();
        //         $('#instagram_profile').hide();
        //         if (e.linkedin_profile !== null) {
        //             $('#linkedin_profile')
        //                 .attr('href', e.linkedin_profile)
        //                 .show();
        //         }
        //         if (e.instagram_profile !== null) {
        //             $('#instagram_profile')
        //                 .attr('href', e.instagram_profile)
        //                 .show();
        //         }
        //         $('#photo_link').attr('src', e.photo_link);
        //         $('#userProfileModal').modal('show');
        //     });
        // });


        $(function () {
            Livewire.on('openModal', (e) => {
                @if(auth()->check() && auth()->user()->uid !== null && auth()->user()->memberships()->whereExists(function ($query) {
                    $query->select(DB::raw(1))
                        ->from('memberships')
                        ->join('users', 'memberships.user_id', '=', 'users.id')
                        ->where('memberships.user_id', '=', auth()->user()->id)
                        ->whereDate('memberships.expired_at', '>=', now())
                        ->whereRaw('memberships.id = (
                            SELECT MAX(id) FROM memberships
                            WHERE memberships.user_id = users.id
                        )');
                    })->exists())
                    $('#uid').text(e.uid);
                    var iconsHtml = `${e.name}`;

                    if (e.memberships && e.memberships.length > 0) {
                        var currentDate = new Date();
                        var activeMembership = e.memberships.find(membership => {
                            var expiredDate = new Date(membership.expired_at);
                            // Check if expired_at is today or after today
                            return expiredDate >= currentDate.setDate(currentDate.getDate() - 1);
                        });
                        if (activeMembership) {
                            iconsHtml += ` <i class="fas fa-check-circle" style="font-size: 20px; color: #0c6c9d;" title="@lang('profile.member-verify-check')"></i>`;
                        }
                    }
                    if (e.is_admin == 1) {
                        iconsHtml += ` <i class="fas fa-key" style="font-size: 20px; color: #ffcb3d;" title="@lang('profile.member-admin-check')"></i>`;
                    }
                    if (e.is_admin == 2) {
                        iconsHtml += ` <i class="fas fa-code" style="font-size: 20px; color: #d95353;" title="@lang('profile.member-developer-check')"></i>`;
                    }
                    $('#name_1').html(iconsHtml);
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
                @elseif(auth()->check() && auth()->user()->uid !== null && auth()->user()->memberships()->whereExists(function ($query) {
                    $query->select(DB::raw(1))
                        ->from('memberships')
                        ->join('users', 'memberships.user_id', '=', 'users.id')
                        ->where('memberships.user_id', '=', auth()->user()->id)
                        ->whereDate('memberships.expired_at', '<', now())
                        ->whereRaw('memberships.id = (
                            SELECT MAX(id) FROM memberships
                            WHERE memberships.user_id = users.id
                        )');
                    })->exists())
                    // alert("Aktifkan kartu keanggotaan Anda");
                    $('#membershipModal-perpanjangan').modal('show');
                @else
                    $('#membershipModal-buatKTA').modal('show');
                @endif
            });
        });

    </script>
@endpush
