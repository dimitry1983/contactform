<?php

namespace Purifymedia\Contactform;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class ContactFormServiceProvider extends ServiceProvider
{
    public function boot()
    {


        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__.'/resources/views', 'contactform');


        $this->publishes([
            __DIR__.'/config/contactform.php' => config_path('contactform.php'),
        ], 'contactform-config');

        $this->publishes([
            __DIR__.'/resources/views' => resource_path('views/vendor/contactform'),
        ], 'contactform-views');

        Blade::component('contactform::components.contact-form', 'contact-form');

    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/config/contactform.php', 'contactform'
        );

    }
}
