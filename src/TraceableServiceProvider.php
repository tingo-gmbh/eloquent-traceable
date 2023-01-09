<?php

namespace Tingo\Traceable;

use Illuminate\Support\ServiceProvider;

class TraceableServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/traceable.php', 'traceable');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {

            // publish config file.
            $this->publishes([
                __DIR__ . '/../config/traceable.php' => config_path('traceable.php'),
            ], 'config');

            // Publish migrations
            $this->publishes([
                __DIR__ . '/../database/migrations/2023_01_09_080439_create_traces_table.php' => database_path('migrations/2023_01_09_080439_create_traces_table.php')
            ], 'migrations');
        }
    }
}