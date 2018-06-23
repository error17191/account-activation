<?php

namespace App\Listeners\Auth;

use App\Events\Auth\UserRequestsActivationEmail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendActivationEmail
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
     * @param  UserRequestsActivationEmail  $event
     * @return void
     */
    public function handle(UserRequestsActivationEmail $event)
    {
        dd($event);
    }
}
