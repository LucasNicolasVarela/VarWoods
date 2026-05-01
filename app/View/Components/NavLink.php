<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class NavLink extends Component
{
    public string $to = '';

    /**
     * Create a new component instance.
     */
    public function __construct(string $to = '')
    {
        $this->to = $to;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.nav-link');
    }
}
