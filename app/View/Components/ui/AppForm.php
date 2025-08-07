<?php

namespace App\View\Components\ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AppForm extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
         public string $methoid = "POST",
         public string $action = "",
         public bool $hasFiles = false
    ){} 

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ui.app-form');
    }
}
