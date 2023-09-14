<?php namespace Waynelogic\ImageResizer\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Image extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string  $src,
        public string  $w,
        public string  $h,
        public ?string $class = null,
        public ?array $options = null,
        public ?string $alt = null
    )
    {
        if (empty($this->options)) {
            $this->options = [
                'extension' => 'webp'
            ];
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('ir::image');
    }
}
