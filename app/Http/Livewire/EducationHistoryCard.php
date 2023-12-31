<?php

namespace App\Http\Livewire;

use App\Enums\EducationLevel;
use App\Http\Livewire\Concerns\HasProfileForm;
use App\Models\EducationHistory;
use BenSampo\Enum\Rules\EnumValue;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Arr;
use Livewire\Component;

class EducationHistoryCard extends Component
{
    use HasProfileForm;

    public ?EducationHistory $model = null;

    public ?string $institution_name = null;

    public ?string $major = null;

    public string|int|null $level = null;

    public Carbon|string|null $graduation_date = null;

    public function mount(): void
    {
        $this->user->load('educationHistories');
    }

    public function render(): View
    {
        $this->level ??= EducationLevel::SeniorHighSchool;
        $this->resourceName = trans('profile.education-history.singular-name');

        return view('profile.education-history.card');
    }

    public function saving(): void
    {
        if (is_null($this->model)) {
            $this->model = new EducationHistory();
            $this->model->user_id = auth()->id();
            $this->model->setHighestOrderNumber();
        }

        $this->model->fill([
                'institution_name' => $this->institution_name,
                'graduation_date' => $this->graduation_date,
                'major' => $this->major,
                'level' => $this->level,
            ]);
    }

    public function beforeEdit(?string $id): void
    {
        $this->model = $this->user->educationHistories
            ->firstWhere('id', $id);
        $this->institution_name = $this->model->institution_name;
        $this->major = $this->model->major;
        $this->level = $this->model->level->value;
        $this->graduation_date = $this->model->graduation_date?->format('Y-m');
    }

    public function reordering(array $data): void
    {
        EducationHistory::setNewOrder(Arr::pluck($data, 'value'));
    }

    public function deleting(?string $id): void
    {
        $this->user->educationHistories->firstWhere('id', $id)?->delete();
    }

    public function rules(): array
    {
        return [
            'institution_name' => ['required', 'string', 'max:200'],
            'major' => ['required', 'string', 'max:200'],
            'level' => ['required', new EnumValue(EducationLevel::class, false)],
            'graduation_date' => ['required', 'date'],
        ];
    }

    public function validationAttributes(): array
    {
        return EducationHistory::attributes();
    }
}
