<?php

namespace App\Providers;

use App\Models\Passport;
use App\Policies\PassportPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Passport::class => PassportPolicy::class,
    ];

    public function boot()
    {
        $this->registerPolicies();
    }
}
