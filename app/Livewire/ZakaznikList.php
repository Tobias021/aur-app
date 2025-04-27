<?php

namespace App\Livewire;

use App\Models\ZakaznikModel;
use App\Traits\TableSortHeader;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout("components.layouts.app-odd")]
class ZakaznikList extends Component
{
    const DEFAULT_ORDER_BY = "id";

    use TableSortHeader;

    public function render()
    {
        return view("livewire.zakaznik-list", [
            "zakaznici" => ZakaznikModel::orderBy(
                $this->orderBy[0],
                $this->orderBy[1]
            )->paginate(30),
        ]);
    }

    public function editZakaznik($id)
    {
        return $this->redirect("/zakaznik/$id");
    }

    public function deleteZakaznik($id)
    {
        // Implement delete functionality here
    }
}
