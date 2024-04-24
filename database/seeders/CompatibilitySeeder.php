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

            Compatibilidad::create([
                'name' => 'Incompatible',
                'colors' => 'danger'
            ]);

            Compatibilidad::create([
                'name' => 'Compatible',
                'colors' => 'success'
            ]);

            Compatibilidad::create([
                'name' => 'No probada',
                'colors' => 'info'
            ]);

            Compatibilidad::create([
                'name' => 'Variable',
                'colors' => 'warning'
            ]);

            Compatibilidad::create([
                'name' => 'Incierta',
                'colors' => 'secondary'
            ]);


    }
}
