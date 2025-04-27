<?php

namespace App\Livewire;

use App\Traits\TableSortHeader;
use Illuminate\Http\Request;
use Livewire\WithPagination;
use Livewire\Component;
use App\Models\DokladModel;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Session;

#[Layout("components.layouts.app-odd")]
class DataList extends Component
{
    const EDITABLE_ROW_COLOR = "bg-yellow-200";
    const EXPANDED_ROW_COLOR = "bg-red-200";
    const DEFAULT_ORDER_BY = "cislo_opravneho_dokladu";

    use TableSortHeader;
    use WithPagination;

    public $rowColor = self::EXPANDED_ROW_COLOR;

    #[Session]
    public $expandedRow = null;

    public int $rand = 555;

    public ?string $message = null;

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

    public function render(Request $request)
    {
        $message = $request->session()->get("message");
        if ($message != "") {
            $this->message = $message;
        }
        // if ($this->expandedRow != null) {
        //     $tmp = $this->expandedRow;
        //     $this->expandedRow = null;
        //     $this->expandedRow = $tmp;
        // }
        $doklady = DokladModel::leftJoin(
            "zakaznik",
            "doklady.zakaznik_id",
            "=",
            "zakaznik.id"
        );

        return view("livewire.data-list", [
            "doklady" => $doklady
                ->orderBy($this->orderBy[0], $this->orderBy[1])
                ->paginate(30),
        ]);
    }
    // public function getDefaultOrderBy(): string
    // {
    //     return self::DEFAULT_ORDER_BY;
    // }
}
