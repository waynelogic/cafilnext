<?php

namespace Waynelogic\Corporate;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Waynelogic\Corporate\View\Components\ModalWindow;

class CorporateServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->registerPublishables();
        Blade::component('modal-window', ModalWindow::class);
//        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
//        $this->loadViewsFrom(__DIR__.'/../resources/views', 'owl');
    }

    /**
     * Migrations
     * php artisan vendor:publish --provider="Waynelogic\Corporate\CorporateServiceProvider" --tag="migrations"
     */

    protected function registerPublishables() : void
    {
        $arTables = [
            'create_banners_table.php',
            'create_departments_table.php',
            'create_employees_table.php',
            'create_jobs_table.php',
            'create_partners_table.php',
            'create_services_categories_table.php',
            'create_services_table.php',
            'create_projects_table.php'
        ];

        if (! $this->app->runningInConsole()) {
            return;
        }

        foreach ($arTables as $table) {
            if (empty(glob(database_path('migrations/*_' . $table)))) {
                $this->publishes([
                    __DIR__.'/../database/migrations/' . $table => database_path('migrations/'.date('Y_m_d_His', time()).'_' . $table),
                ], 'migrations');
            }
        }
    }
}
