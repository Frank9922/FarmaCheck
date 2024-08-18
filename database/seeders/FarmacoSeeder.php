<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Farmaco;


class FarmacoSeeder extends Seeder
{


    public function run(): void
    {

        $farmacos = require('./database/seeders/farmacos.php');
        
        foreach($farmacos as $farmaco){
            $farmacoConFormato = ucwords(strtolower($farmaco));
            Farmaco::create(
                ['name' => $farmaco,
                'label'=>$farmacoConFormato,
                ]

            );
        }
    }
}
