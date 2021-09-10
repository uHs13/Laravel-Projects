<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\HomeEvent;

class HomeListener
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
     * @param  HomeEvent  $event
     * @return void
     */
    public function handle(HomeEvent $event)
    {
        info('HomeListener');
        info($event->text);
    }
}