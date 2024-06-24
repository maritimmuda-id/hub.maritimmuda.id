<div class="card p-3 m-4" style="border: none;">
    <div class="card-body row">
        <div class="col-md-10">
            <div class="card-header pt-0 pl-0" style="border: none;">
                <h4>
                    <b>
                        @if ($model)
                            @lang('Edit :resource', [
                                'resource' => trans('profile.publication.singular-name')
                            ])
                        @else
                            @lang('Create :resource', [
                                'resource' => trans('profile.publication.singular-name')
                            ])
                        @endif
                    </b>
                </h4>
            </div>
            <x-form wire:submit.prevent="save" class="card" files>
                <div class="card-body row">
                    @wire('defer')
                        <div class="col-md-6">
                            <x-form-input
                                name="title"
                                :label="trans('profile.publication.title-label')"
                            />
                        </div>
                        <div class="col-md-6">
                            <x-form-input
                                name="author_name"
                                :label="trans('profile.publication.author-name-label')"
                                placeholder="Kaisar Akhir, Antonius Rio Sandi Sirait, Burhanuddin"
                            />
                        </div>
                        <div class="col-md-6">
                            <x-form-select
                                name="type"
                                :label="trans('profile.publication.type-label')"
                                :options="\App\Enums\PublicationType::asSelectArray()"
                            />
                        </div>
                        <div class="col-md-6">
                            <x-form-input
                                name="publisher"
                                :label="trans('profile.publication.publisher-label')"
                            />
                        </div>
                        <div class="col-md-6">
                            <x-form-input
                                name="city"
                                :label="trans('profile.publication.city-label')"
                            />
                        </div>
                        <div class="col-md-6">
                            <x-form-date
                                name="publish_date"
                                :label="trans('profile.publication.publish-date-label')"
                                wire-modifier="defer"
                                format="YYYY-MM"
                            />
                        </div>
                        <div class="col-md-6">
                            <x-form-input
                                type="file"
                                name="first_page"
                                :label="trans('profile.publication.first-page-label')"
                            />
                        </div>
                    @endwire
                </div>
                <div class="card-footer" style="border: none;">
                    <x-save-button />
                    <x-reset-button wire:click.prevent="resetForm" />
                </div>
            </x-form>

            <div wire:sortable="reorder" class="list-group">
                @foreach ($user->publications as $item)
                    <div
                        wire:sortable.item="{{ $item->id }}"
                        wire:sortable.key="list-group-item-{{ $item->id }}"
                        class="list-group-item d-flex flex-row justify-content-between"
                    >
                        <div class="d-flex flex-row justify-content-start align-items-center">
                            <img style="width:70px" class="img-fluid img-thumbnail" src="{{ $item->first_page_link }}" alt="">
                            <div class="ml-3">
                                <h4>
                                    {{ $item->title }}
                                    <small>{{ $item->publisher }}</small>
                                </h4>
                                <strong class="inline">
                                    {{ $item->publish_date_formatted }}
                                </strong>
                            </div>
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
