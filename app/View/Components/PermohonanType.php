<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PermohonanType extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public $class, public $name)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.permohonan-type');
    }
}
