<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Laravel\Horizon\Horizon;
use Laravel\Horizon\HorizonApplicationServiceProvider;

class HorizonServiceProvider extends HorizonApplicationServiceProvider
{
    public function boot(): void
    {
        parent::boot();

        Horizon::night();
    }

    protected function gate(): void
    {
        Gate::define('viewHorizon', function (?User $user) {
            return in_array($user->email, [
                'zhanang19@gmail.com',
                'admin@maritimmuda.id',
                'mail@zhanang.id',
            ]);
        });
    }
}
