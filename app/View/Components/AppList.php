<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class AppList extends Component
{
    public $items;
    public $columns;
    public $actions;

    /**
     * Create a new component instance.
     *
     * @param  mixed  $items      // Eloquent collection or array
     * @param  array  $columns    // Key-value pair of attribute => label
     * @param  array  $actions    // Array of action buttons (optional)
     */
    public function __construct($items, $columns = [], $actions = [])
    {
        $this->items = $items;
        $this->columns = $columns ?? [];
        $this->actions = $actions;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.app-list');
    }
}
