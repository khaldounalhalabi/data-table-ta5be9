<?php

namespace App\View\Components\show;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ShowLayout extends Component
{
    public $title ;
    public $editRoute ;

    /**
     * Create a new component instance.
     */
    public function __construct($title , $editRoute = null)
    {
        $this->title = $title ;
        $this->editRoute = $editRoute ;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.show.show-layout');
    }
}
