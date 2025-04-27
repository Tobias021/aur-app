<?php

namespace Tests\Feature\Livewire;

use App\Livewire\TableSortHeader;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class TableSortHeaderTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(TableSortHeader::class)
            ->assertStatus(200);
    }
}
