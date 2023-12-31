<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Concerns\HasProfileForm;
use App\Models\Research;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Arr;
use Livewire\Component;

class ResearchCard extends Component
{
    use HasProfileForm;

    public ?Research $model = null;

    public ?string $name = null;

    public ?string $role = null;

    public ?string $institution_name = null;

    public ?string $sponsor_name = null;

    public Carbon|string|null $start_date = null;

    public Carbon|string|null $end_date = null;

    public function mount(): void
    {
        $this->user->load('researchs');
    }

    public function render(): View
    {
        $this->resourceName = trans('profile.research.singular-name');

        return view('profile.research.card');
    }

    public function saving(): void
    {
        if (is_null($this->model)) {
            $this->model = new Research();
            $this->model->user_id = auth()->id();
            $this->model->setHighestOrderNumber();
        }

        $this->model->fill([
                'name' => $this->name,
                'role' => $this->role,
                'institution_name' => $this->institution_name,
                'sponsor_name' => $this->sponsor_name,
                'start_date' => $this->start_date,
                'end_date' => $this->end_date,
            ]);
    }

    public function beforeEdit(?string $id): void
    {
        $this->model = $this->user->researchs
            ->firstWhere('id', $id);
        $this->name = $this->model->name;
        $this->role = $this->model->role;
        $this->institution_name = $this->model->institution_name;
        $this->sponsor_name = $this->model->sponsor_name;
        $this->start_date = $this->model->start_date?->format('Y-m');
        $this->end_date = $this->model->end_date?->format('Y-m');
        $this->dispatchBrowserEvent('');
    }

    public function reordering(array $data): void
    {
        Research::setNewOrder(Arr::pluck($data, 'value'));
    }

    public function deleting(?string $id): void
    {
        $this->user->researchs->firstWhere('id', $id)?->delete();
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:200'],
            'role' => ['required', 'string', 'max:200'],
            'institution_name' => ['required', 'string', 'max:200'],
            'sponsor_name' => ['required', 'string', 'max:200'],
            'start_date' => ['required', 'date'],
            'end_date' => ['nullable', 'date'],
        ];
    }

    public function validationAttributes(): array
    {
        return Research::attributes();
    }
}
