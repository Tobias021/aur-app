<?php

namespace App\View\Components;

use App\Models\ZakaznikModel;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ZakaznikRow extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public ZakaznikModel $zakaznik) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view(
            "components.zakaznik-row",
            data: [
                "zakaznik" => $this->zakaznik,
            ]
        );
    }
}
