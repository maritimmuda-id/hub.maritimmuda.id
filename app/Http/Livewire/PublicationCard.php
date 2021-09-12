<?php

namespace App\Http\Livewire;

use App\Enums\PublicationType;
use App\Http\Livewire\Concerns\HasProfileForm;
use App\Models\Publication;
use BenSampo\Enum\Rules\EnumValue;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Arr;
use Livewire\Component;
use Livewire\TemporaryUploadedFile;

class PublicationCard extends Component
{
    use HasProfileForm;

    public ?Publication $model = null;

    public ?string $title = null;

    public ?string $author_name = null;

    public string|int|null $type = null;

    public ?string $publisher = null;

    public TemporaryUploadedFile|string|null $first_page = null;

    public ?string $city = null;

    public Carbon|string|null $publish_date = null;

    public function mount(): void
    {
        $this->user->load('publications');
    }

    public function render(): View
    {
        $this->type ??= PublicationType::Book;
        $this->resourceName = trans('profile.publication.singular-name');

        return view('profile.publication.card');
    }

    public function saving(): void
    {
        if (is_null($this->model)) {
            $this->model = new Publication();
            $this->model->user_id = auth()->id();
            $this->model->setHighestOrderNumber();
        }

        $this->model->fill([
                'title' => $this->title,
                'author_name' => $this->author_name,
                'type' => $this->type,
                'publisher' => $this->publisher,
                'city' => $this->city,
                'publish_date' => $this->publish_date,
            ]);

        if ($this->first_page) {
            $this->model->addMedia($this->first_page->getRealPath())
                ->toMediaCollection('first_page');
        }
    }

    public function beforeEdit(?string $id): void
    {
        $this->model = $this->user->publications
            ->firstWhere('id', $id);
        $this->title = $this->model->title;
        $this->author_name = $this->model->author_name;
        $this->type = $this->model->type->value;
        $this->publisher = $this->model->publisher;
        $this->city = $this->model->city;
        $this->publish_date = $this->model->publish_date?->format('Y-m');
    }

    public function reordering(array $data): void
    {
        Publication::setNewOrder(Arr::pluck($data, 'value'));
    }

    public function deleting(?string $id): void
    {
        $this->user->publications->firstWhere('id', $id)?->delete();
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:200'],
            'author_name' => ['required', 'string', 'max:200'],
            'type' => ['required', new EnumValue(PublicationType::class, false)],
            'publisher' => ['required', 'string', 'max:200'],
            'city' => ['required', 'string', 'max:200'],
            'publish_date' => ['required', 'date'],
            'first_page' => ['nullable', 'image', 'max:1024'],
        ];
    }

    public function validationAttributes(): array
    {
        return Publication::attributes();
    }
}
