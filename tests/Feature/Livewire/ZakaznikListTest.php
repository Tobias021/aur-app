<?php

namespace Tests\Feature\Livewire;

use App\Livewire\ZakaznikList;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ZakaznikListTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(ZakaznikList::class)
            ->assertStatus(200);
    }
}
