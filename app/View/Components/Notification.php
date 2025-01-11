<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Notification extends Component
{
    public $displayDuration;

    public $soundEffect;

    /**
     * Create a new component instance.
     */
    public function __construct($displayDuration = 8000, $soundEffect = true)
    {
        $this->displayDuration = $displayDuration;
        $this->soundEffect = $soundEffect;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.notification');
    }
}
