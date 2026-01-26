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
    public $bgColor;
    public $msgColor;
    public function __construct($type = 'button', $class = '')
    {
        //
        $this->type = $type;
        $this->class = $class ?: 'rounded-md border px-3 py-2 text-sm font-semibold';
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.button');
    }
}
