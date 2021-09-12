<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form wire:submit.prevent="save" class="card border-primary">
                    <div class="card-header">
                        @if ($model)
                            @lang('Edit :resource', [
                                'resource' => trans('profile.achievement-history.singular-name')
                            ])
                        @else
                            @lang('Create :resource', [
                                'resource' => trans('profile.achievement-history.singular-name')
                            ])
                        @endif
                    </div>
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
                                <x-form-input
                                    type="month"
                                    name="achieved_at"
                                    :label="trans('profile.achievement-history.achieved-at-label')"
                                />
                            </div>
                        @endwire
                    </div>
                    <div class="card-footer">
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
</div>
