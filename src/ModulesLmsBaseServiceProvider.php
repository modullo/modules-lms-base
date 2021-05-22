<?php

namespace Lms\ModulesLmsBase;

use Illuminate\Support\ServiceProvider;

class ModulesLmsBaseServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__.'/resources/views', 'modules-lms-base');

        $this->publishes([
            __DIR__.'/config/navigation-menu.php' => config_path('navigation-menu.php')
        ],'nav-config');
        $this->publishes([
            __DIR__.'/resources/views/navigation.blade.php' => resource_path('views/layouts/nav/navigation.blade.php')
        ],'navigation');
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/config/navigation-menu.php', 'navigation-menu'
        );
    }
}
