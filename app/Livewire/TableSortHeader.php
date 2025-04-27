<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class TableSortHeader extends Component
{
    public string $title;
    public string $sorterFor;
    public string $sortOrder = "desc";
    public string $beingSorted;

    #[On("orderChanged")]
    public function orderChanged($beingSorted, $order)
    {
        $this->beingSorted = $beingSorted;
        if ($this->sorterFor == $this->beingSorted) {
            $this->sortOrder = $order;
        }
    }

    public function render()
    {
        return <<<'HTML'
    <th scope="col"
        class="px-6 py-3 cursor-pointer"
        wire:click="$parent.sort('{{ $this->sorterFor }}')"
    >
        {{ $this->title }}
        @if ($this->beingSorted === $this->sorterFor && $this->sortOrder == "asc")
            <span>&uarr;</span>
        @elseif ($this->beingSorted === $this->sorterFor && $this->sortOrder == "desc")
            <span>&darr;</span>
        @endif
    </th>
HTML;
    }
}
