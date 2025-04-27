<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ZakaznikModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "jmeno" => fake()->name(),
            "ulice" => fake()->streetAddress(),
            "mesto" => fake()->city(),
            "psc" => fake()->numberBetween(10000, 99999),
            "stat" => fake()->country(),
            "dic" => fake()->numberBetween(10000000, 99999999),
        ];
    }
}
