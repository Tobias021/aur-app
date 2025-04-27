<?php

namespace App\Livewire;

use App\Models\ZakaznikModel;
use Illuminate\Http\Client\Request;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Session;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Layout("components.layouts.app-odd")]
class ZakaznikPage extends Component
{
    private ZakaznikModel $zakaznik;

    #[Session]
    public $zakaznikEditId;

    #[Validate("required|string|max:50")]
    public $jmeno;
    #[Validate("required|string|max:255")]
    public $ulice;
    #[Validate("required|string|max:255")]
    public $mesto;
    #[Validate("required|max:6")]
    public $psc;
    #[Validate("required|string|max:100")]
    public $stat;
    #[Validate("max:10")]
    public $dic;

    public $isNew = true;

    public function mount(int $id = 0)
    {
        if ($id != 0) {
            $zakaznik = ZakaznikModel::find($id);
            if (!$zakaznik) {
                session()->flash("error", "Zákazník nenalezen.");
                return $this->redirect("/odd");
            }
            $this->zakaznikEditId = $zakaznik->id;
            $this->isNew = false;
            $this->zakaznik = $zakaznik;
            $this->fill(
                $zakaznik->only([
                    "jmeno",
                    "ulice",
                    "mesto",
                    "psc",
                    "stat",
                    "dic",
                ])
            );
        }
    }

    public function create()
    {
        $this->validate();

        ZakaznikModel::create([
            "jmeno" => $this->jmeno,
            "ulice" => $this->ulice,
            "mesto" => $this->mesto,
            "psc" => $this->psc,
            "stat" => $this->stat,
            "dic" => $this->dic,
        ]);

        return $this->redirect("/zakaznik");
    }

    public function update()
    {
        $this->validate();

        $zakaznik = ZakaznikModel::find($this->zakaznikEditId);
        $zakaznik->update($this->all());

        return $this->redirect("/zakaznik");
    }

    public function render()
    {
        return view("livewire.zakaznik-page");
    }
}
