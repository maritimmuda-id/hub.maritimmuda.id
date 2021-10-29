<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class IdentityCardPreview extends Component
{
    public User $user;

    public array $attributes = [];

    public function render()
    {
        return view('livewire.identity-card-preview');
    }
}
