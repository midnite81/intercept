<?php

namespace Midnite81\Intercept;

use Illuminate\Support\ServiceProvider;

class InterceptServiceProvider extends ServiceProvider
{

    protected $defer = true;
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

        $this->publishes([
            __DIR__ . '/../config/intercept.php' => config_path('intercept.php')
        ]);
        $this->mergeConfigFrom(__DIR__ . '/../config/intercept.php', 'intercept');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
