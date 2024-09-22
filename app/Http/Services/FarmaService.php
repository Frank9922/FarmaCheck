<?php 
namespace App\Http\Services;

use App\Models\Farmaco;
use App\Models\FarmacoCompatibilidad;

class FarmaService {

    public static function getFarmacos() {

        $farmacos = Farmaco::select('id', 'name', 'label', 'accion_teraupetica')->get();

        return $farmacos;
    }

    public static function check(int $farmaco1, int $farmaco2) {

        $resp = FarmacoCompatibilidad::where(function ( $query ) use ( $farmaco1) {
            $query->where('first_farmaco', $farmaco1)
            ->orWhere('second_farmaco', $farmaco1);
        })
        ->where( function ( $query ) use ( $farmaco2 ) {
                $query->where('first_farmaco', $farmaco2)
                ->orWhere('second_farmaco', $farmaco2);
        })
        ->with('compatibilidad')
        ->with('firstFarmaco')
        ->with('secondFarmaco')
        ->first();
        
        if(!$resp) return null;

        return $resp;

    }
}

?>