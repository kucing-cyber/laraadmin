<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('isSuperUser', function($user){
            return $user->type === 'superuser';
        });

        Gate::define('isAdmin', function($user){
            return $user->type === 'admin';
        });

        Gate::define('isBendahara', function($user){
            return $user->type === 'bendahara';
        });

        Gate::define('isTU', function($user){
            return $user->type === 'TU';
        });

        Gate::define('isGuru', function($user){
            return $user->type === 'guru';
        });

        Gate::define('isSiswa', function($user){
            return $user->type === 'siswa';
        });

        Passport::routes();
    }
}
