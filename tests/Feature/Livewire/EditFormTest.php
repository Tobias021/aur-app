<?php

namespace Tests\Feature\Livewire;

use App\Models\DokladModel;
use App\Livewire\EditForm;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class EditFormTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(new EditForm()->mount(DokladModel::orderBy("id")->first()))
            ->assertStatus(200);
    }
}
