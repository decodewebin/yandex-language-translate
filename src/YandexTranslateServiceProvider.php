<?php

namespace Decodewebin\YandexTranslate;

use Illuminate\Support\ServiceProvider;

class YandexTranslateServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function register()
    {
        $this->app->make('Decodewebin\YandexTranslate\YandexTranslateController');
        $this->loadViewsFrom(__DIR__.'/views', 'translator');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->loadMigrationsFrom(__DIR__.'/migrations/2019_07_23_052548_create_languages_table.php'); // no need to export or publish to database/migrations

        //publishing essential parts
        $this->publishes([
            __DIR__.'/yandex_config.php' => config_path('yandex_config.php'),
        ],'yandex_config');
    }
}
