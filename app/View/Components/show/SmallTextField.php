<?php

namespace App\View\Components\show;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SmallTextField extends Component
{
    public $label;
    public $value;
    public $classes;

    /**
     * Create a new component instance.
     */
    public function __construct($label, $value, $classes = '')
    {
        $this->label = $label;
        $this->value = $value;
        $this->classes = $classes ;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.show.small-text-field');
    }
}
