<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;
#[Layout("components.layouts.app-odd")]
class DataForm extends Component
{
    public string $message;
    public function mount(string $id)
    {
        $this->message = $id;
    }

    public function render()
    {
        return view("livewire.data-form");
    }
}
