<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    const BRANDS = [
        'Mercedes-Benz',
        'BMW',
        'Volkswagen',
        'MINI',
        'Suzuki',
        'Fiat',
        'Toyota',
        'Nissan',
        'Opel',
        'Ferrari',
        'Bugatti',
        'BYD',
        'Audi',
        'Renault',
        'Citroen',
        'Bentley',
        'Rolls-Royce',
    ];

    public function run(): void
    {
        foreach (self::BRANDS as $name) {
            Brand::create([
                'name' => $name,
            ]);
        }
    }
}