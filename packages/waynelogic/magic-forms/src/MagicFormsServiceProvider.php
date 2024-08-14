<?php

namespace Waynelogic\MagicForms;

use Illuminate\Support\ServiceProvider;

class MagicFormsServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../config/magic-forms.php' => config_path('magic-forms.php'),
        ]);
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'magic-forms');
    }

    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/magic-forms.php', 'magic-forms'
        );
    }
}
