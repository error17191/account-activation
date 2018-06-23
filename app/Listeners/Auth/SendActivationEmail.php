<?php

namespace App\Listeners\Auth;

use App\Events\Auth\UserRequestsActivationEmail;
use App\Mail\Auth\ActivationEmail;
use Illuminate\Support\Facades\Mail;

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
     * @param  UserRequestsActivationEmail $event
     * @return void
     */
    public function handle(UserRequestsActivationEmail $event)
    {
        if ($event->user->active) {
            return;
        }

        Mail::to($event->user->email)->send(new ActivationEmail($event->user));
    }
}
