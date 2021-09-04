<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form wire:submit.prevent="save" class="card border-primary">
                    <div class="card-header">
                        @if ($model)
                            @lang('Edit :resource', [
                                'resource' => trans('profile.research.singular-name')
                            ])
                        @else
                            @lang('Create :resource', [
                                'resource' => trans('profile.research.singular-name')
                            ])
                        @endif
                    </div>
                    <div class="card-body row">
                        @wire('defer')
                            <div class="col-md-6">
                                <x-form-input
                                    name="name"
                                    :label="trans('profile.research.name-label')"
                                />
                            </div>
                            <div class="col-md-6">
                                <x-form-input
                                    name="role"
                                    :label="trans('profile.research.role-label')"
                                />
                            </div>
                            <div class="col-md-6">
                                <x-form-input
                                    name="institution_name"
                                    :label="trans('profile.research.institution-name-label')"
                                />
                            </div>
                            <div class="col-md-6">
                                <x-form-input
                                    type="month"
                                    name="year"
                                    :label="trans('profile.research.year-label')"
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
                    @foreach ($user->researchs as $item)
                        <div
                            wire:sortable.item="{{ $item->id }}"
                            wire:sortable.key="list-group-item-{{ $item->id }}"
                            class="list-group-item d-flex flex-row justify-content-between"
                        >
                            <div>
                                <h4>
                                    {{ $item->name }}
                                    <small>{{ $item->role }}</small>
                                </h4>
                                <strong class="inline">
                                    {{ $item->institution_name }}
                                </strong>
                                <small>{{ $item->year_formatted }}</small>
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