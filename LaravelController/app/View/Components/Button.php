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
        $this->class = $class ?: 'shadow bg-linear-to-r from-cyan-500 to-blue-500 text-white font-bold py-2 px-4 rounded' ;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.button');
    }
}
