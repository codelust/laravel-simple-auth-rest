<?php

namespace Frontiernxt\LaravelRESTApi\Events\Emitters;

use Illuminate\Queue\SerializesModels;

class NewUser
{


    use SerializesModels;
    
    public $user;

    /**
     * Create a new event instance.
     *
     * @param  Order  $order
     * @return void
     */
    /*public function __construct(Order $order)
    {
        $this->order = $order;
    }*/

    public function __construct($user)
    {
        $this->user = $user;
    }
}