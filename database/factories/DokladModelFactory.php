<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\DokladModel;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DokladModelFactory extends Factory
{
    protected $model = DokladModel::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $neDph = $this->faker->numberBetween(0, 25000);
        $bezDph = $this->faker->numberBetween(0, 100);
        $sazbaDph = $this->faker->randomElement([0, 12, 21]);
        $dph = $bezDph * ($sazbaDph / 100);
        $celkem = $neDph + $bezDph + $dph;

        return [
            "cislo_opravneho_dokladu" =>
                "ODD24" . $this->faker->numberBetween(0, 9999),
            "datum_platby" => $this->faker->dateTimeBetween(
                "1. 1. 2020",
                "31. 11. 2024"
            ),
            "zakaznik_id" => $this->faker->numberBetween(1, 50),
            "cislo_dokladu" =>
                "D" . $this->faker->numberBetween(24000000, 24999999),
            "castka_ne_dph" => $neDph,
            "castka_bez_dph" => $bezDph,
            "sazba_dph" => $sazbaDph,
            "dph" => $dph,
            "castka_celkem" => $celkem,
            "doklad_suma" => $this->faker->numberBetween(0, 100),
            "mena" => $this->faker->randomElement(["eur", "czk"]),
            "cislo_zalohove_faktury" =>
                "ZF" . $this->faker->numberBetween(23000000, 24000000),
        ];
    }
}
