<?php

namespace App\Http\Controllers;

use App\Http\Resources\ApiResource;
use App\Models\FarmacoCompatibilidad;
use App\Models\Farmaco;


class ApiController extends Controller
{
    public function farmacos() {

        $farmacos = Farmaco::select('id', 'name')->get();

        return response()->json([
            'farmacos' => $farmacos
        ], 200);

    }




    public function check($farmaco1, $farmaco2) {

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

        return new ApiResource($resp);


        }


}
