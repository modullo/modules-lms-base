<?php

namespace Modullo\ModulesLmsBase;
use Illuminate\Support\ServiceProvider;

class ModulesLmsBaseServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__.'/resources/views', 'modules-lms-base');

        // $this->publishes([
        //     __DIR__.'/resources/views/navigation.blade.php' => resource_path('views/layouts/nav/navigation.blade.php')
        // ],'navigation');

        $this->publishes([
            __DIR__.'/resources/breadcrumbs' => public_path('vendor/breadcrumbs'),
        ], 'modullo-modules');

        $this->publishes([
            __DIR__.'/config/modules-lms-base.php' => config_path('modules-lms-base.php')
        ], 'modullo-modules');

        $this->publishes([
            __DIR__.'/resources/assets' => public_path('vendor/assets'),
        ], 'modullo-modules');

    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/config/navigation-menu.php', 'modullo-navigation-menu.modules-lms-base'
        );
    }
}
