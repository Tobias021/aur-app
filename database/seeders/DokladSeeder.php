<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\DokladModel;
use Illuminate\Database\Seeder;

class DokladSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DokladModel::factory()->count(120)->create();
    }
}
