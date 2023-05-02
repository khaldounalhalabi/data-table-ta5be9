<?php

namespace App\View\Components\forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CreateForm extends Component
{
    public $formTitle;
    public $action;
    public $method;

    /**
     * Create a new component instance.
     */
    public function __construct($formTitle, $action, $method = 'POST')
    {
        $this->formTitle = $formTitle;
        $this->action = $action;
        $this->method = $method;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.create-form');
    }
}
