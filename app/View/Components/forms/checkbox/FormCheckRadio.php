<?php

namespace App\View\Components\forms\checkbox;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormCheckRadio extends Component
{
    public $name;
    public $value;
    public $checked;

    /**
     * Create a new component instance.
     */
    public function __construct($name, $value, $checked = null)
    {
        $this->value = $value;
        $this->name = $name;
        $this->checked = $checked;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.checkbox.form-check-radio');
    }
}
