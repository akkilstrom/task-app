<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
    * The event listener mappings for the application.
    *
    * @var array
    **/
    protected $listen = [
        // The listener is good to reach for when you want to fire many things 
        // in response to this event
        'App\Events\ThreadCreated' => [
            'App\Listeners\NotifySubscribers',
            'App\Listeners\CheckForSpam'
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
