<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('impersonate', function (User $authenticatedUser, User $user) {
            return $authenticatedUser->canImpersonate()
                && $user->canBeImpersonated()
                && $authenticatedUser->id !== $user->id;
        });

        Gate::define('verify-member', function (User $authenticatedUser, User $user) {
            if (! $authenticatedUser->is_admin) {
                return false;
            }

            if (is_null($user->membership)) {
                return true;
            }

            if ($user->membership->expired_at->isPast()) {
                return true;
            }

            return false;
        });

        Gate::define('find-member', function (User $authenticatedUser) {
            return true;
        });
    }
}
