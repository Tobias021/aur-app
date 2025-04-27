<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;

class Counter extends Component
{
    public $count = 0;

    public $borderColor = "red";

    public function increment(): void
    {
        $this->count++;
        $this->switchColor();
    }

    public function decrement(): void
    {
        $this->count--;
        $this->switchColor();
    }
    private function switchColor()
    {
        if ($this->borderColor == "bg-blue-400") {
            $this->borderColor = "bg-green-400";
        } else {
            $this->borderColor = "bg-blue-400";
        }
    }

    #[Layout("components.layouts.app-odd")]
    public function render()
    {
        return view("livewire.counter");
    }
}
