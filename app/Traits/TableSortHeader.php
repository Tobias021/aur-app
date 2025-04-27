<?php

namespace App\Traits;

use Livewire\Attributes\Session;
use Livewire\Attributes\On;

trait TableSortHeader
{
    #[Session]
    public $orderBy = [self::DEFAULT_ORDER_BY, "desc"];

    #[On("sort")]
    public function sort(string $column): void
    {
        if ($column != $this->orderBy[0]) {
            $this->orderBy[0] = $column;
            $this->orderBy[1] = "desc";
        } else {
            $this->orderBy[1] = $this->orderBy[1] == "desc" ? "asc" : "desc";
        }
        parent::dispatch(
            "orderChanged",
            beingSorted: $this->orderBy[0],
            order: $this->orderBy[1]
        );
    }
}
