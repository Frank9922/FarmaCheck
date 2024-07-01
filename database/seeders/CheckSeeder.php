<?php

namespace Database\Seeders;

use App\Models\FarmacoCompatibilidad;
use Faker\Core\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CheckSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            $json = file_get_contents(__DIR__ . '/farmaco_compatibilidads.json');

            if(!$json) echo "not found file";

            $data = json_decode($json, true);

            $count= 0;

            foreach($data as $registro) {
                FarmacoCompatibilidad::create([
                    'first_farmaco' =>$registro['first_farmaco'],
                    'second_farmaco' =>$registro['second_farmaco'],
                    'id_compatibilidad' =>$registro['id_compatibilidad']
                ]);
                $count++;
            }

            echo "Se insertaron ". $count . " registros en la base de datos";


    }
}
