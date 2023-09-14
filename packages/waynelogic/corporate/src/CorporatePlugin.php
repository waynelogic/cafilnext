<?php namespace Waynelogic\Corporate;

use Filament\Contracts\Plugin;
use Filament\Panel;

use Waynelogic\Corporate\Filament\Resources;

class CorporatePlugin implements Plugin
{
    public function getId(): string
    {
        return 'corporate';
    }

    public function register(Panel $panel): void
    {
        $panel
            ->resources([
                Resources\BannerResource::class,
                Resources\DepartmentResource::class,
                Resources\EmployeeResource::class,
                Resources\JobResource::class,
                Resources\ProjectResource::class,
                Resources\BannerResource::class,
                Resources\Services\ServiceResource::class,
                Resources\Services\CategoryResource::class,
            ]);
    }

    public function boot(Panel $panel): void
    {

    }
}
