<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Alert extends Component
{
    /**
     * Create a new component instance.
     */
    public $class;
    public function __construct($class = '')
    {
        //
        // $this->type = $type;
        $this->class = $class ?: 'text-center bg-blue-200 text-xl text-blue-700';
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.alert');
    }
}
