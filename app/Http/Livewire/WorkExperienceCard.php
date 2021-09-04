<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Concerns\HasProfileForm;
use App\Models\WorkExperience;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Arr;
use Livewire\Component;

class WorkExperienceCard extends Component
{
    use HasProfileForm;

    public ?WorkExperience $model = null;

    public ?string $position_title = null;

    public ?string $company_name = null;

    public Carbon|string|null $start_date = null;

    public Carbon|string|null $end_date = null;

    public function mount(): void
    {
        $this->user->load('workExperiences');
    }

    public function render(): View
    {
        $this->resourceName = trans('profile.work-experience.singular-name');

        return view('profile.work-experience.card');
    }

    public function saving(): void
    {
        if (is_null($this->model)) {
            $this->model = new WorkExperience();
            $this->model->user_id = auth()->id();
            $this->model->setHighestOrderNumber();
        }

        $this->model->fill([
                'position_title' => $this->position_title,
                'company_name' => $this->company_name,
                'start_date' => $this->start_date,
                'end_date' => $this->end_date,
            ]);
    }

    public function beforeEdit(?string $id): void
    {
        $this->model = $this->user->workExperiences
            ->firstWhere('id', $id);
        $this->position_title = $this->model->position_title;
        $this->company_name = $this->model->company_name;
        $this->start_date = $this->model->start_date?->format('Y-m-d');
        $this->end_date = $this->model->end_date?->format('Y-m-d');
    }

    public function reordering(array $data): void
    {
        WorkExperience::setNewOrder(Arr::pluck($data, 'value'));
    }

    public function deleting(?string $id): void
    {
        $this->user->workExperiences->firstWhere('id', $id)?->delete();
    }

    public function rules(): array
    {
        return [
            'position_title' => ['required', 'string', 'max:200'],
            'company_name' => ['required', 'string', 'max:200'],
            'start_date' => ['required', 'date'],
            'end_date' => ['nullable', 'date', 'after:start_date'],
        ];
    }
}
