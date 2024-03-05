<?php

namespace App\View\Components;

use Closure;
use App\Models\Album;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class table extends Component
{
    public $all_data;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->all_data=Album::with("images")->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table');
    }
}
