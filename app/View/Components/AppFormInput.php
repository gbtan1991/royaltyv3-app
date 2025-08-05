<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AppFormInput extends Component
{
    public $name;
    public $label;
    public $type;
    public $value;


    public function __construct($name, $label = "", $type= "text", $value = null)
    {
        $this->name = $name;
        $this->label = $label ?: ucfirst(str_replace('_',' ', $name));
        $this->type = $type;
        $this->value = $value;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.app-form-input');
    }
}
