<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout("components.app-odd")]
class DokladyTable extends Component
{
    public function render()
    {
        return view("livewire.doklady-table");
    }
}
