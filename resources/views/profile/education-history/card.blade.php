<div class="card">
    <div class="card-body row">
        <div class="col-md-10">
            <form wire:submit.prevent="save" class="card border-primary">
                <div class="card-header">
                    @if ($model)
                        @lang('Edit :resource', [
                            'resource' => trans('profile.education-history.singular-name')
                        ])
                    @else
                        @lang('Create :resource', [
                            'resource' => trans('profile.education-history.singular-name')
                        ])
                    @endif
                </div>
                <div class="card-body row">
                    @wire()
                        <div class="col-md-6">
                            <x-form-input
                                name="institution_name"
                                :label="trans('profile.education-history.institution-name-label')"
                            />
                        </div>
                        <div class="col-md-6">
                            <x-form-input
                                name="major"
                                :label="trans('profile.education-history.major-label')"
                            />
                        </div>
                        <div class="col-md-6">
                            <x-form-select
                                name="level"
                                :label="trans('profile.education-history.level-label')"
                                :options="\App\Enums\EducationLevel::asSelectArray()"
                            />
                        </div>
                        <div class="col-md-6">
                            <x-form-date
                                name="graduation_date"
                                :label="trans('profile.education-history.graduation-date-label')"
                                wire-modifier="defer"
                                format="YYYY-MM"
                            >
                                <x-slot name="help">
                                    <small class="form-text text-muted">@lang('profile.education-history.or-expected-graduation-date')</small>
                                </x-slot>
                            </x-form-input>
                        </div>
                    @endwire
                </div>
                <div class="card-footer">
                    <x-save-button />
                    <x-reset-button wire:click.prevent="resetForm" />
                </div>
            </form>

            <div wire:sortable="reorder" class="list-group">
                @foreach ($user->educationHistories as $item)
                    <div
                        wire:sortable.item="{{ $item->id }}"
                        wire:sortable.key="list-group-item-{{ $item->id }}"
                        class="list-group-item d-flex flex-row justify-content-between"
                    >
                        <div>
                            <h4>{{ $item->institution_name }}</h4>
                            <strong class="inline">{{ $item->major }}</strong> | <small class="inline">{{ $item->graduation_date_formatted }}</small>
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
