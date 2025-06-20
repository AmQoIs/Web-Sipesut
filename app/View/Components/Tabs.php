<?php

namespace App\View\Components;

use App\Models\History;
use App\Models\Surat;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class Tabs extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public Surat $surat,
        public Collection $riwayats
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.tabs');
    }
}
