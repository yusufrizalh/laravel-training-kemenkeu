<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        'App\Post' => 'App\Policies\PostPolicy',
    ];

    public function boot()
    {
        $this->registerPolicies();

        Gate::before(function ($user) {
            return $user->isAdmin() ? true : null;
        });
    }
}
