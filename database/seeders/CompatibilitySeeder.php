<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Compatibilidad;

class CompatibilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $compatibility = [
            'Incompatible',
            'Compatible',
            'No probada',
            'Variable',
            'Incierta'
        ];

        foreach($compatibility as $compatibilidad) {
            Compatibilidad::create([
                'name' => $compatibilidad
            ]);
        }

    }
}
