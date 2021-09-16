<?php

namespace App\Http\Livewire;

use App\Models\Expertise;
use App\Models\Province;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class FindMemberCard extends Component
{
    use WithPagination;

    protected string $paginationTheme = 'bootstrap';

    protected $queryString = [
        'province' => ['except' => ''],
        'expertise' => ['except' => ''],
        'search' => ['except' => ''],
    ];

    public array $provinces = [];

    public array $expertises = [];

    public ?string $search = null;

    public string|int|null $province = '';

    public string|int|null $expertise = '';

    protected \Illuminate\Database\Eloquent\Builder|User|null $query = null;

    public function __construct()
    {
        $this->provinces = Province::query()
            ->pluck('name', 'id')
            ->toArray();

        $this->expertises = Expertise::query()
            ->pluck('name', 'id')
            ->toArray();

        $this->query = User::query()
            ->with([
                'province',
                'firstExpertise',
                'secondExpertise',
            ]);
    }

    public function render()
    {
        if ($this->search) {
            $this->query->where('name', 'like', "%{$this->search}%");
        }

        if ($this->province) {
            $this->query->whereHas('province', function ($query) {
                /** @var \Illuminate\Database\Eloquent\Builder $query */
                $query->whereKey($this->province);
            });
        }

        if ($this->expertise) {
            $this->query->where(function ($query) {
                /** @var \Illuminate\Database\Eloquent\Builder $query */
                $query->whereHas('firstExpertise', function ($query) {
                    /** @var \Illuminate\Database\Eloquent\Builder $query */
                    $query->whereKey($this->expertise);
                })
                    ->orWhereHas('secondExpertise', function ($query) {
                        /** @var \Illuminate\Database\Eloquent\Builder $query */
                        $query->whereKey($this->expertise);
                    });
            });
        }

        $users = $this->query->paginate(8)
            ->appends('search', $this->search)
            ->appends('province', $this->province)
            ->appends('expertise', $this->expertise);

        return view('member.card', compact('users'));
    }

    public function show(?string $userUuid): void
    {
        /** @var \App\Models\User|null $user */
        $user = User::query()->firstWhere('uuid', $userUuid);

        if ($user) {
            $this->emit('openModal', [
                'uid' => $user->uid,
                'name' => $user->name,
                'email' => $user->email,
                'photo_link' => $user->photo_link,
                'place_of_birth' => $user->place_of_birth,
                'date_of_birth' => $user->date_of_birth,
                'gender' => $user->gender->description,
                'province' => $user->province->name,
                'linkedin_profile' => $user->linkedin_profile,
                'instagram_profile' => $user->instagram_profile,
                'first_expertise' => $user->firstExpertise->name,
                'second_expertise' => $user->secondExpertise->name,
                'permanent_address' => $user->permanent_address,
                'residence_address' => $user->residence_address,
                'bio' => $user->bio,
            ]);
        }

        return;
    }
}
