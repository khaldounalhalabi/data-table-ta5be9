<?php

namespace App\View\Components\forms\checkbox;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormCheckInput extends Component
{
    public $label;
    public $name;
    public $checked;

    /**
     * Create a new component instance.
     */
    public function __construct($label, $name,$checked = null)
    {
        $this->label = $label;
        $this->name = $name;
        $this->checked = $checked;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.checkbox.form-check-input');
    }
}
