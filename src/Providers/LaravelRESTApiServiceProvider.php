<?php

namespace Frontiernxt\LaravelRESTApi\Providers;

use Illuminate\Support\ServiceProvider;

class LaravelRESTApiServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        //include __DIR__.'/routes.php';
        include dirname( __FILE__, 2 ).'/Routes/api.php';
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
        //$this->app->make('Frontiernxt\LaravelRESTApi\Http\Controllers\LaravelRESTApiController');
        //$this->app->make('Frontiernxt\LaravelRESTApi\Http\Controllers\User');
        $this->loadViewsFrom(dirname( __FILE__, 2 ).'/views', 'fnxt-laravel-rest-api');
    }
}
