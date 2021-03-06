<?php

namespace Alpaca\Page;

use Illuminate\Support\ServiceProvider as Provider;

class PageServiceProvider extends Provider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
    }

    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/Views', 'page');
        $this->loadTranslationsFrom(__DIR__.'/Lang', 'page');

        $this->publishes([
            __DIR__.'/Config/' => base_path('/config'),
        ], 'migrations');

        $this->publishes([
            __DIR__.'/Migrations/' => base_path('/database/migrations'),
        ], 'migrations');

        $this->publishes([
            __DIR__.'/Seeds/' => base_path('/database/seeds'),
        ], 'seeds');

        if (! $this->app->routesAreCached()) {
            require __DIR__.'/routes.php';
        }
    }
}
