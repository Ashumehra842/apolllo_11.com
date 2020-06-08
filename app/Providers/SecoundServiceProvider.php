<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class SecoundServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        app()->bind('secondfun',function(){
            $var = "this is my second function for learning service provider";
            return ucwords($var);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
