<?php

namespace App\Http\Livewire\Concerns;

use App\Models\User;
use Livewire\WithFileUploads;

trait HasProfileForm
{
    use WithFileUploads;

    public ?string $resourceName = null;

    public ?User $user = null;

    public function __construct()
    {
        /** @var \App\Models\User */
        $this->user = auth()->user();
    }

    public function save()
    {
        $this->resetErrorBag();

        $this->validate();

        $this->saving();

        $this->model->save();

        if ($this->model->wasRecentlyCreated) {
            $this->notify(__(':resource created', ['resource' => $this->resourceName]));
        } else {
            $this->notify(__(':resource updated', ['resource' => $this->resourceName]));
        }

        $this->user->refresh();

        $this->resetForm();
    }

    public function edit(?string $id): void
    {
        $this->resetForm();

        $this->beforeEdit($id);
    }

    public function reorder(array $data): void
    {
        $this->reordering($data);

        $this->notify(__(':resource updated', ['resource' => $this->resourceName]));

        $this->user->refresh();
    }

    public function delete(?string $id): void
    {
        $this->deleting($id);

        $this->notify(__(':resource deleted', ['resource' => $this->resourceName]));

        $this->user->refresh();
    }

    public function resetForm(): void
    {
        $properties = collect($this->getPublicPropertiesDefinedBySubClass())
            ->keys()
            ->except(['user', 'resourceName'])
            ->toArray();

        $this->resetErrorBag();
        $this->reset($properties);
    }

    protected function notify(string $message): void
    {
        $this->emit('toast', [
            'title' => $message,
            'icon' => 'success'
        ]);
    }
}
