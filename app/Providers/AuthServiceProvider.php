<?php

namespace App\Providers;

use App\Acl\AccessControl;
use App\Http\Responses\Errors;
use App\Loggers\Logger;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Imanghafoori\HeyMan\Conditions\ConditionsFacade;
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
        $this->defineConditions();
        $this->authenticate();
    }

    private function defineConditions()
    {
        app(ConditionsFacade::class)
            ->define('youShouldBeAdmin', AccessControl::class . '@beAdmin');
    }

    private function authenticate()
    {
        HeyMan::whenYouHitRouteName('panel.admin')
            ->youShouldBeLoggedIn()
//            ->youShouldBeAdmin()
            ->otherwise()
            ->afterCalling(Logger::class . '@logGuestAccess')
            ->weRespondFrom(Errors::class . '@toWelcomePage');

        HeyMan::whenYouVisitUrl('/user/panel')
            ->youShouldBeLoggedIn()
            ->otherwise()
//            ->afterCalling(Logger::class.'@longOperation')
            ->response()->view('welcome')
            ->then()->terminateWith(Logger::class . '@longOperation');

    }
}
