<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Button extends Component
{
    /**
     * Create a new component instance.
     */
    public $type;
    public $class;
    public function __construct($type = 'button', $class = '')
    {
        //
        $this->type = $type;
        $this->class = $class ?: 'bg-blue-500 text-white hover:bg-blue-600';
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.button');
    }
}
