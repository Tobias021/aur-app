<?php

namespace Tests\Feature;

use Tests\TestCase;

class HealthcheckTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_tento_test_zkouší_načtení_stránky_conuter(): void
    {
        $response = $this->get("/");

        $response->assertStatus(200);
    }
}
