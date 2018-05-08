<?php

namespace Frontiernxt\LaravelRESTApi\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class LaravelRESTEventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        /*'App\Events\Event' => [
            'App\Listeners\EventListener',
        ],*/
        'Frontiernxt\LaravelRESTApi\Events\Emitters\NewUser' => [
        'Frontiernxt\LaravelRESTApi\Events\Listeners\NewUser',
        ],

    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
