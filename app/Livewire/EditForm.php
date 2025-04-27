<?php

namespace App\Livewire;

use App\Models\DokladModel;
use Livewire\Component;
use Livewire\Attributes\Session;

class EditForm extends Component
{
    public DokladModel $doklad;

    public $meny = ["czk", "eur", "yen", "usd"];

    public $rowEditable;

    public $castkaBez;

    public $sazbaDph;

    public $dph;

    public $celkem;

    public function mount($doklad)
    {
        $this->doklad = $doklad;
        $this->loadDatabaseData();
    }

    public function render()
    {
        return view("livewire.edit-form");
    }

    public function updated()
    {
        if ($this->castkaBez == "") {
            $this->castkaBez = 0;
        }

        if ($this->sazbaDph == "") {
            $this->sazbaDph = 0;
        }

        $this->dph = round($this->castkaBez * ($this->sazbaDph / 100), 2);
        $this->celkem = round($this->castkaBez + $this->dph, 2);
    }

    public function editClicked()
    {
        $this->rowEditable = true;
    }

    public function cancelEdit()
    {
        $this->rowEditable = false;
        $this->loadDatabaseData();
    }

    // public function saveData()
    // {
    //     $doklad = $this->doklad;
    //     $doklad->castka_ne_dph = $this->castkaNepodlehajici;
    //     $doklad->castka_bez_dph = $this->castkaBez;
    //     $doklad->sazba_dph = $this->sazbaDph;
    //     $doklad->dph = $this->dph;
    //     $doklad->castka_celkem = $this->celkem;
    //     $doklad->save();
    //     $this->rowEditable = false;
    // }

    public function loadDatabaseData()
    {
        $doklad = $this->doklad;
        $this->castkaNepodlehajici = $doklad->castka_ne_dph;

        $this->castkaBez = $doklad->castka_bez_dph;

        $this->sazbaDph = $doklad->sazba_dph;

        $this->dph = $doklad->dph;

        $this->celkem = $doklad->castka_celkem;
    }
}
