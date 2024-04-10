<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Farmaco;


class FarmacoSeeder extends Seeder
{


    public function run(): void
    {


        $farmacos = [
            'ACICLOVIR',
            'ÁCIDO TRANEXÁMICO',
            'ADRENALINA',
            'ALPROSTADIL',
            'AMIKACINA',
            'AMINOFILINA',
            'AMIODARONA',
            'AMPICILINA',
            'AMPICILINA-SULBACTAM',
            'ANFOTERICINA (ABELCET)',
            'ANFOTERICINA B',
            'ANFOTERICINA LIPOSOMAL',
            'ANIDULOFUNGINA',
            'BICARBONATO DE SODIO',
            'CALCIO CLORURO',
            'CALCIO GLUCONATO',
            'CASPOFUNGIN',
            'CEFALOTINA',
            'CEFOTAXIMA',
            'CEFTAZIDIMA',
            'CEFTRIAXONA',
            'CEFUROXIMA',
            'CICLOSPORINA',
            'CIPROFLOXACINA',
            'CLARITROMICINA',
            'CLINDAMICINA',
            'CLONIDINA',
            'CLORPROMAZINA',
            'COLISTIN',
            'DAPTOMICINA',
            'DEXAMETASONA',
            'DEXMEDETOMIDINA',
            'DIAZEPAM',
            'DIFENHIDRAMINA',
            'DOBUTAMINA',
            'DOPAMINA',
            'ENALAPRILATO',
            'ESMOLOL',
            'ESTREPTOMICINA',
            'FENITOINA',
            'FENOBARBITAL',
            'FENTANILO',
            'FLUCONAZOL',
            'FOSCARNET',
            'FOSFATO de POTASIO',
            'FUROSEMIDA',
            'GANCICLOVIR',
            'GENTAMICINA',
            'HEPARINA SÓDICA',
            'HIDROCORTISONA',
            'HIDROXOCOBALAMINA',
            'IMIPENEM',
            'INDOMETACINA SÓDICA',
            'INSULINA REGULAR',
            'LABETALOL',
            'LEVETIRACETAM',
            'LIDOCAÍNA',
            'LINEZOLID',
            'LORAZEPAM',
            'MAGNESIO SULFATO',
            'MEROPENEM',
            'METILPREDNISOLONA',
            'METOCLOPRAMIDA',
            'METRONIDAZOL',
            'MIDAZOLAM',
            'MILRINONA',
            'MORFINA',
            'NITROPRUSIATO DE SODIO',
            'NORADRENALINA',
            'OCTREOTIDA',
            'OMEPRAZOL',
            'PANCURONIO',
            'PARACETAMOL',
            'PENICILINA G. SODICA',
            'PENTAMIDINA',
            'PIPER-TAZPBACTAM',
            'POTASIO CLORURO',
            'PROPRANOLOL',
            'RANITIDINA',
            'REMIFENTANILO',
            'RIFAMPICINA',
            'ROCURONIO',
            'SILDENAFIL',
            'SODIO FOSFATO',
            'TACROLIMUS',
            'TIGECICLINA',
            'TIOPENTAL',
            'TRIMETOP- SULFAMETOXAZOL',
            'VANCOMICINA',
            'VASOPRESINA',
            'VECURONIO',
            'VORICONAZOL',
            'ZIDOVUDINA'
        ];

        foreach($farmacos as $farmaco){

            Farmaco::create(
                ['name' => $farmaco]
            );
        }


    }
}
