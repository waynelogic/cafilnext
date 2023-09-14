<?php

namespace Waynelogic\Corporate\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ModalWindow extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $id,
        public string $view,
        public ?string $title
    )
    {
//        dd(1);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view($this->view);
    }
}
