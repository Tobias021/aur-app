<?php

namespace Database\Seeders;

use App\Models\ZakaznikModel;
use Illuminate\Database\Seeder;

class ZakaznikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ZakaznikModel::factory()->count(50)->create();
    }
}
