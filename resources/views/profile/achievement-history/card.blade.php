<div class="card p-3 m-4" style="border: none;">
    <div class="card-body row">
        <div class="col-md-10">
            <div class="card-header pt-0 pl-0" style="border: none;">
                <h4>
                    <b>
                        @if ($model)
                            @lang('Edit :resource', [
                                'resource' => trans('profile.achievement-history.singular-name')
                            ])
                        @else
                            @lang('Create :resource', [
                                'resource' => trans('profile.achievement-history.singular-name')
                            ])
                        @endif
                    </b>
                </h4>
            </div>
            <form wire:submit.prevent="save" class="card">
                <div class="card-body row">
                    @wire('defer')
                        <div class="col-md-6">
                            <x-form-input
                                name="award_name"
                                :label="trans('profile.achievement-history.award-name-label')"
                            />
                        </div>
                        <div class="col-md-6">
                            <x-form-input
                                name="appreciator"
                                :label="trans('profile.achievement-history.appreciator-label')"
                            />
                        </div>
                        <div class="col-md-6">
                            <x-form-input
                                name="event_name"
                                :label="trans('profile.achievement-history.event-name-label')"
                            />
                        </div>
                        <div class="col-md-6">
                            <x-form-input
                                name="event_level"
                                :label="trans('profile.achievement-history.event-level-label')"
                            />
                        </div>
                        <div class="col-md-6">
                            <x-form-date
                                name="achieved_at"
                                :label="trans('profile.achievement-history.achieved-at-label')"
                                wire-modifier="defer"
                                format="YYYY-MM"
                            />
                        </div>
                    @endwire
                </div>
                <div class="card-footer" style="border: none;">
                    <x-save-button />
                    <x-reset-button wire:click.prevent="resetForm" />
                </div>
            </form>

            <div wire:sortable="reorder" class="list-group">
                @foreach ($user->achievementHistories as $item)
                    <div
                        wire:sortable.item="{{ $item->id }}"
                        wire:sortable.key="list-group-item-{{ $item->id }}"
                        class="list-group-item d-flex flex-row justify-content-between"
                    >
                        <div>
                            <h4>
                                {{ $item->event_name }}
                                <small>{{ $item->event_level }}</small>
                            </h4>
                            <strong class="inline">{{ $item->award_name }}</strong>
                            <span>-</span>
                            <span>{{ $item->achieved_at_formatted }}</span>
                        </div>
                        <div class="d-flex align-items-center justify-content-around" style="width:20%">
                            <button class="btn btn-info" wire:click="edit('{{ $item->id }}')">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button
                                class="btn btn-danger"
                                {{ $model?->id === $item->id ? 'disabled' : '' }}
                                wire:click="delete('{{ $item->id }}')"
                            >
                                <i class="fas fa-trash"></i>
                            </button>
                            <button wire:sortable.handle class="btn btn-secondary" style="cursor:move">
                                <i class="fas fa-bars"></i>
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
