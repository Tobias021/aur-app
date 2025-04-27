<?php

namespace App\Livewire;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\DokladModel;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Session;

#[Layout("components.layouts.app-odd")]
class DataList extends Component
{
    use WithPagination;

    const EDITABLE_ROW_COLOR = "bg-yellow-200";
    const EXPANDED_ROW_COLOR = "bg-red-200";

    public $rowColor = self::EXPANDED_ROW_COLOR;

    #[Session]
    public $expandedRow = null;

    #[Session]
    public $pendingExpand = null;

    public int $rand = 555;

    #[Session]
    public $orderBy = ["cislo_opravneho_dokladu", "desc"];

    public function rendered()
    {
        $this->rand = random_int(1, 10000);
    }

    public function expandRow($id)
    {
        if ($id !== $this->expandedRow) {
            $this->expandedRow = $id;
        } else {
            $this->expandedRow = null;
        }
        $this->pendingExpand = null;
    }

    #[On("sort")]
    public function sort($column)
    {
        if ($column != $this->orderBy[0]) {
            $this->orderBy[0] = $column;
            $this->orderBy[1] = "desc";
        } else {
            $this->orderBy[1] = $this->orderBy[1] == "desc" ? "asc" : "desc";
        }
        $this->dispatch(
            "orderChanged",
            beingSorted: $this->orderBy[0],
            order: $this->orderBy[1]
        );
    }

    // #[On("row_editable")]
    // public function rowEditable(): void
    // {
    //     $this->rowColor = self::EDITABLE_ROW_COLOR;
    // }

    // #[On("row_not_editable")]
    // public function rowNotEditable(): void
    // {
    //     $this->rowColor = self::EXPANDED_ROW_COLOR;
    // }

    public function render()
    {
        // if ($this->expandedRow != null) {
        //     $tmp = $this->expandedRow;
        //     $this->expandedRow = null;
        //     $this->expandedRow = $tmp;
        // }
        return view("livewire.data-list", [
            "doklady" => DokladModel::orderBy(
                $this->orderBy[0],
                $this->orderBy[1]
            )->paginate(30),
        ]);
    }
}
