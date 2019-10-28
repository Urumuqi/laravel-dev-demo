<?php
/**
 * user auth provider.
 *
 * @author wuqi <wuqi226@gmail.com>
 */

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Auth\UserAuthService;
use Tymon\JWTAuth\JWTGuard;

/**
 * Class UserAuthProvider.
 */
class UserAuthProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Auth::extend('user', function ($app, $name, array $config) {
            return new JWTGuard(
                $app['tymon.jwt'],
                new UserAuthService($app->make('App\Models\User')),
                $app['request']
            );
        });
    }
}
