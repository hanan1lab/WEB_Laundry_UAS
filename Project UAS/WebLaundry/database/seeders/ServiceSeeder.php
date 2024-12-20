<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Service::create(['name' => 'Cuci Sepatu', 'price_per_kg' => 9000]);
        Service::create(['name' => 'Cuci Spray', 'price_per_kg' => 28000]);
    }
}
