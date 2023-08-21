<div class="card">
    <div class="card-body row">
        <div class="col-md-10">
            <form wire:submit.prevent="save" class="card border-primary">
                <div class="card-header">
                    @if ($model)
                        @lang('Edit :resource', [
                            'resource' => trans('profile.organization-history.singular-name')
                        ])
                    @else
                        @lang('Create :resource', [
                            'resource' => trans('profile.organization-history.singular-name')
                        ])
                    @endif
                </div>
                <div class="card-body row">
                    @wire('defer')
                        <div class="col-md-6">
                            <x-form-input
                                name="organization_name"
                                :label="trans('profile.organization-history.organization-name-label')"
                            />
                        </div>
                        <div class="col-md-6">
                            <x-form-input
                                name="role"
                                :label="trans('profile.organization-history.role-label')"
                            />
                        </div>
                        <div class="col-md-6">
                            <x-form-date
                                name="period_start_date"
                                :label="trans('profile.organization-history.period-start-date-label')"
                                wire-modifier="defer"
                                format="YYYY-MM"
                            />
                        </div>
                        <div class="col-md-6">
                            <x-form-date
                                name="period_end_date"
                                :label="trans('profile.organization-history.period-end-date-label')"
                                wire-modifier="defer"
                                format="YYYY-MM"
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
                @foreach ($user->organizationHistories as $item)
                    <div
                        wire:sortable.item="{{ $item->id }}"
                        wire:sortable.key="list-group-item-{{ $item->id }}"
                        class="list-group-item d-flex flex-row justify-content-between"
                    >
                        <div>
                            <h4>
                                {{ $item->organization_name }}
                                <small>{{ $item->role }}</small>
                            </h4>
                            <strong class="inline">
                                {{ $item->period_start_date_formatted }} - {{ $item->period_end_date_formatted }}
                            </strong>
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
