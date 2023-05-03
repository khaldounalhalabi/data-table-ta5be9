<?php

namespace App\View\Components\show;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LongTextField extends Component
{
    public $label;
    public $value;

    /**
     * Create a new component instance.
     */
    public function __construct($label, $value)
    {
        $this->label = $label;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.show.long-text-field');
    }
}
