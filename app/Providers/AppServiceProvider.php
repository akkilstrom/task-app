<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
    * Bootstrap any application services.
    *
    * @return void
    **/

    // Place any action or logic with the assumption that the framework is fully loaded
    public function boot() {

        // Listen for  when the layouts. sidebar is loaded & then register a.. 
        // callback function where we can bind anything to that view
        view()->composer('layouts.sidebar', function($view) {
            $archives = \App\Task::archives();
            $tags = \App\Tag::has('tasks')->pluck('name');

            // Adds the archive & tags (if they are associated with a card) 
            $view->with( compact('archives', 'tags') );
        });
    }

    /**
    * Register any application services.
    *
    * @return void
    **/

    // You use this method to register things into the service container
    public function register()
    {
        //
    }
}
