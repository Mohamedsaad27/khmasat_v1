<?php

namespace App\View\Components\Admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class sidebarItems extends Component
{
    public $items;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->items = config('admin.sidebarItems');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.sidebar-items');
    }
}
