<?php

namespace Database\Seeders;

use App\Models\Models;
use App\Models\Brand;
use Illuminate\Database\Seeder;

class ModelSeeder extends Seeder
{
    public function run(): void
    {
        $models = [
            'BMW' => [
                '1-es sorozat',
                '3-as sorozat',
                '5-ös sorozat',
                '7-es sorozat',
                'X1',
                'X2',
                'X3',
                'X5',
                'X7',
                'M2',
                'M3',
                'M4',
                'M5',
                'M8',
                'M5cs',
            ],

            'Audi' => [
                'A1',
                'A3',
                'A4',
                'A5',
                'A6',
                'A7',
                'A8',
                'Q5',
                'Q7',
            ],

            'Toyota' => [
                'Corolla',
                'Yaris GR',
                'RAV4',
                'Camry',
            ],

            'Mercedes-Benz' => [
                'Vito',
                'Sprinter',
                '190',
                'A-class',
                'C-class',
                'CLK',
                'E-class',
                'CLS',
                'S-class',
                'G-class',
                'EQC',
                'EQE',
                'GLA',
                'GLE',
                'GLS',
                'ML',
                'AMG GT',
                'AMG GT S',
                'AMG GT R',
            ],
            'Renault' => [
                'Clio',
                'Megane',
                'Captur',
                'Twingo',
            ],

            'Citroen' => [
                'C3',
                'C4',
                'C5 Aircross',
            ],

            'Bentley' => [
                'Continental GT',
                'Flying Spur',
                'Bentayga',
            ],

            'Rolls-Royce' => [
                'Phantom',
                'Ghost',
                'Cullinan',
            ],
            'Nissan' => [
                'Qashqai',
                'Juke',
                'Micra',
                'X-Trail',
            ],

            'Opel' => [
                'Astra',
                'Corsa',
                'Insignia',
                'Mokka',
            ],

            'Ferrari' => [
                'F40',
                'F50',
                '488',
                'Roma',
            ],

            'Bugatti' => [
                'Veyron',
                'Chiron',
                'Divo',
            ],

            'BYD' => [
                'Dolphin',
                'Atto 3',
                'Seal',
            ],
            'Volkswagen' => [
                'Golf',
                'Passat',
                'Polo',
                'Tiguan',
            ],

            'MINI' => [
                'Cooper',
                'Countryman',
                'Clubman',
            ],

            'Suzuki' => [
                'Swift',
                'Vitara',
                'S-Cross',
            ],

            'Fiat' => [
                '500',
                'Panda',
                'Punto',
                'Tipo',
            ],
        ];

        foreach ($models as $brandName => $modelNames) {

            $brand = Brand::where('name', $brandName)->first();

            if ($brand) {
                foreach ($modelNames as $modelName) {
                    Models::create([
                        'name' => $modelName,
                        'brand_id' => $brand->id,
                    ]);
                }
            }
        }
    }
}