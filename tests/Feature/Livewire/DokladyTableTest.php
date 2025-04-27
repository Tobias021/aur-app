<?php

namespace Tests\Feature\Livewire;

use App\Livewire\DokladyTable;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class DokladyTableTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(DokladyTable::class)
            ->assertStatus(200);
    }
}
