<?php

namespace Frontiernxt\LaravelRESTApi\Events\Listeners;

use Frontiernxt\LaravelRESTApi\Events\Emitters\NewUser as NewUserEvent;

class NewUser
{

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  OrderShipped  $event
     * @return void
     */
    public function handle(NewUserEvent $user)
    {
        // Access the order using $event->order...

        //dd($user->user);

        return false;

    }
}