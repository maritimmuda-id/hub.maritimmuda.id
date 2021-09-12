<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Concerns\HasProfileForm;
use App\Models\OrganizationHistory;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Arr;
use Livewire\Component;

class OrganizationHistoryCard extends Component
{
    use HasProfileForm;

    public ?OrganizationHistory $model = null;

    public ?string $organization_name = null;

    public ?string $role = null;

    public Carbon|string|null $period_start_date = null;

    public Carbon|string|null $period_end_date = null;

    public function mount(): void
    {
        $this->user->load('organizationHistories');
    }

    public function render(): View
    {
        $this->resourceName = trans('profile.organization-history.singular-name');

        return view('profile.organization-history.card');
    }

    public function saving(): void
    {
        if (is_null($this->model)) {
            $this->model = new OrganizationHistory();
            $this->model->user_id = auth()->id();
            $this->model->setHighestOrderNumber();
        }

        $this->model->fill([
                'organization_name' => $this->organization_name,
                'role' => $this->role,
                'period_start_date' => $this->period_start_date,
                'period_end_date' => $this->period_end_date,
            ]);
    }

    public function beforeEdit(?string $id): void
    {
        $this->model = $this->user->organizationHistories
            ->firstWhere('id', $id);
        $this->organization_name = $this->model->organization_name;
        $this->role = $this->model->role;
        $this->period_start_date = $this->model->period_start_date?->format('Y-m');
        $this->period_end_date = $this->model->period_end_date?->format('Y-m');
    }

    public function reordering(array $data): void
    {
        OrganizationHistory::setNewOrder(Arr::pluck($data, 'value'));
    }

    public function deleting(?string $id): void
    {
        $this->user->organizationHistories->firstWhere('id', $id)?->delete();
    }

    public function rules(): array
    {
        return [
            'organization_name' => ['required', 'string', 'max:200'],
            'role' => ['required', 'string', 'max:200'],
            'period_start_date' => ['required', 'date'],
            'period_end_date' => ['nullable', 'date', 'after:start_date'],
        ];
    }

    public function validationAttributes(): array
    {
        return OrganizationHistory::attributes();
    }
}
