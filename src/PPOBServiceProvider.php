<?php

namespace Cst\PPOBLib;

use Illuminate\Support\ServiceProvider;

class PPOBServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/ppob.php' => config_path('ppob.php'),
        ],['cst','ppob','ppob-config']);
    }
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/ppob.php',
            'ppob'
        );
    }
}
