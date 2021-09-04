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

    public Carbon|string|null $year = null;

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
                'year' => $this->year,
            ]);
    }

    public function beforeEdit(?string $id): void
    {
        $this->model = $this->user->researchs
            ->firstWhere('id', $id);
        $this->name = $this->model->name;
        $this->role = $this->model->role;
        $this->institution_name = $this->model->institution_name;
        $this->year = $this->model->year?->format('Y-m');
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
            'year' => ['required', 'date'],
        ];
    }
}
