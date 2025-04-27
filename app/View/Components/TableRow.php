<?php

namespace App\View\Components;

use App\Models\DokladModel;
use App\Models\ZakaznikModel;
use App\Traits\DokladCurrencySymbols;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TableRow extends Component
{
    use DokladCurrencySymbols;
    public string $menaSymbol;
    public string $dic;

    public function __construct(
        public DokladModel $doklad,
        public $expandedRow = false,
        public bool $editable,
        public int $rand = 0
    ) {
        $this->menaSymbol = $this->currencyToSymbol($this->doklad);
        $this->dic = $doklad->zakaznik->dic;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view("components.table-row");
    }
}
