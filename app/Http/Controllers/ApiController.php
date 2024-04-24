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


            $resp = FarmacoCompatibilidad::where('first_farmaco', $farmaco1)
                                                    ->where('second_farmaco', $farmaco2)
                                                    ->with('compatibilidad')
                                                    ->with('firstFarmaco')
                                                    ->with('secondFarmaco')
                                                    ->first();


        // return view('FarmaCompatibildiad.checksucces', compact('compatibilidad'));

        return new ApiResource($resp);

        // return response()->json($resp);

            }


}
