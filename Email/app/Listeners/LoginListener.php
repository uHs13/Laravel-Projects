<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Login;
use App\Mail\LoginMail;

class LoginListener
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
     * @param  object  $event
     * @return void
     */
    public function handle(Login $event)
    {
        info('Logged');
        info($event->user->name);
        info($event->user->email);
        Mail::to($event->user->email)
        //->send(new LoginMail($event->user));
        ->queue(new LoginMail($event->user));
        // ->later(
        //     now()->addMinutes(2),
        //     new LoginMail($event->user)
        // );
    }
}