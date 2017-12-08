<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class HelperServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()  // Edited By HeinHtetAung for helper function call from view getCategories
    {
        foreach (glob(app_path().'/CustomHelpers/*.php') as $filename){
            require_once($filename);
        }
    }
    
}
