<?php

namespace Tests\Feature\Livewire;

use App\Livewire\ZakaznikPage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ZakaznikPageTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(ZakaznikPage::class)
            ->assertStatus(200);
    }
}
