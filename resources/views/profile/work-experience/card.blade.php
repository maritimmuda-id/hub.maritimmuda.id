<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form wire:submit.prevent="save" class="card border-primary">
                    <div class="card-header">
                        @if ($model)
                            @lang('Edit :resource', [
                                'resource' => trans('profile.work-experience.singular-name')
                            ])
                        @else
                            @lang('Create :resource', [
                                'resource' => trans('profile.work-experience.singular-name')
                            ])
                        @endif
                    </div>
                    <div class="card-body row">
                        @wire('defer')
                            <div class="col-md-6">
                                <x-form-input
                                    name="position_title"
                                    :label="trans('profile.work-experience.position-title-label')"
                                />
                            </div>
                            <div class="col-md-6">
                                <x-form-input
                                    name="company_name"
                                    :label="trans('profile.work-experience.company-name-label')"
                                />
                            </div>
                            <div class="col-md-6">
                                <x-form-input
                                    type="date"
                                    name="start_date"
                                    :label="trans('profile.work-experience.start-date-label')"
                                />
                            </div>
                            <div class="col-md-6">
                                <x-form-input
                                    type="date"
                                    name="end_date"
                                    :label="trans('profile.work-experience.end-date-label')"
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
                    @foreach ($user->workExperiences as $item)
                        <div
                            wire:sortable.item="{{ $item->id }}"
                            wire:sortable.key="list-group-item-{{ $item->id }}"
                            class="list-group-item d-flex flex-row justify-content-between"
                        >
                            <div>
                                <h4>
                                    {{ $item->position_title }}
                                    <small>{{ $item->company_name }}</small>
                                </h4>
                                <strong class="inline">
                                    {{ $item->start_date_formatted }} - {{ $item->end_date_formatted }}
                                </strong>
                                <span>|</span>
                                <small class="inline">{{ $item->work_duration }}</small>
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
