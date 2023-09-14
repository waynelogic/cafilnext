<?php

namespace Waynelogic\ImageResizer;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Waynelogic\Corporate\View\Components\ModalWindow;
use Waynelogic\ImageResizer\View\Components\Image;
class ImageResizerServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'ir');
        Blade::component('image', Image::class);
    }
}
