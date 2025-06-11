<?php

namespace App\View\Components\layouts;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Header extends Component
{
    public $headerTitle;
    public $headerSubtitle;
    public $headerLogo1;
    public $headerLogo2;
    public $date;
    public $time;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->headerTitle = 'Department of Labor and Employment';
        $this->headerSubtitle = 'Cavite Provincial Office';
        $this->headerLogo1 = asset('images/bagong-pilipinas.png'); // Adjust the path as needed
        $this->headerLogo2 = asset('images/dole-cavite.png'); // Adjust the path as needed
        $this->date = now()->format('F d, Y');
        // Set initial time with AM/PM format
        $this->time = now()->format('h:i:s A');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layouts.header');
    }
}
