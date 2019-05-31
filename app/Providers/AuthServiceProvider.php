<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Imanghafoori\HeyMan\Facades\HeyMan;

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

        $this->authenticate();
    }

    private function authenticate()
    {
        HeyMan::whenYouHitRouteName('panel.admin')
            ->youShouldBeLoggedIn()
            ->otherwise()
            ->redirect()->to('/welcome');
        HeyMan::whenYouVisitUrl('/user/panel')
            ->youShouldBeLoggedIn()
            ->otherwise()
            ->response()->json(['msg' => 'what do you do here'], 404);


    }
}
