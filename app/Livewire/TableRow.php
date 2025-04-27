<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\DokladModel;
use Livewire\Attributes\Session;

class TableRow extends Component
{
    #[Session]
    public $expandedRow = null;

    public $doklad;

    public function mount(DokladModel $doklad)
    {
        $this->doklad = $doklad;
    }

    public function render()
    {
        return view("livewire.table-row");
    }

    public function edit()
    {
        return view("livewire.data-form");
    }
}
