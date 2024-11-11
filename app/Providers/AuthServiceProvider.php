<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;


use App\Models\User;
use App\Policies\AdminPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */

     /**
     * Массив для хранения политик.
     *
     * @var array
     */
    protected $policies = [
        User::class => AdminPolicy::class,
    ];

    public function register(): void
    {
      //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

    }
}
