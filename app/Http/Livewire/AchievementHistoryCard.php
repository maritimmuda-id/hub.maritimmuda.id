<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Concerns\HasProfileForm;
use App\Models\AchievementHistory;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Arr;
use Livewire\Component;

class AchievementHistoryCard extends Component
{
    use HasProfileForm;

    public ?AchievementHistory $model = null;

    public ?string $award_name = null;

    public ?string $appreciator = null;

    public ?string $event_name = null;

    public ?string $event_level = null;

    public Carbon|string|null $achieved_at = null;

    public function mount(): void
    {
        $this->user->load('achievementHistories');
    }

    public function render(): View
    {
        $this->resourceName = trans('profile.achievement-history.singular-name');

        return view('profile.achievement-history.card');
    }

    public function saving(): void
    {
        if (is_null($this->model)) {
            $this->model = new AchievementHistory();
            $this->model->user_id = auth()->id();
            $this->model->setHighestOrderNumber();
        }

        $this->model->fill([
                'award_name' => $this->award_name,
                'appreciator' => $this->appreciator,
                'event_name' => $this->event_name,
                'event_level' => $this->event_level,
                'achieved_at' => $this->achieved_at,
            ]);
    }

    public function beforeEdit(?string $id): void
    {
        $this->model = $this->user->achievementHistories
            ->firstWhere('id', $id);
        $this->award_name = $this->model->award_name;
        $this->appreciator = $this->model->appreciator;
        $this->event_name = $this->model->event_name;
        $this->event_level = $this->model->event_level;
        $this->achieved_at = $this->model->achieved_at?->format('Y-m');
    }

    public function reordering(array $data): void
    {
        AchievementHistory::setNewOrder(Arr::pluck($data, 'value'));
    }

    public function deleting(?string $id): void
    {
        $this->user->achievementHistories->firstWhere('id', $id)?->delete();
    }

    public function rules(): array
    {
        return [
            'award_name' => ['required', 'string', 'max:200'],
            'appreciator' => ['required', 'string', 'max:200'],
            'event_name' => ['required', 'string', 'max:200'],
            'event_level' => ['required', 'string', 'max:200'],
            'achieved_at' => ['required', 'date'],
        ];
    }

    public function validationAttributes(): array
    {
        return AchievementHistory::attributes();
    }
}
