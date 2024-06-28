<?php

namespace App\Http\Controllers;

use App\Http\Requests\FarmaCompatibilidadRequest;
use Illuminate\Http\Request;
use App\Models\Farmaco;
use App\Models\Compatibilidad;
use App\Models\FarmacoCompatibilidad;

class FarmaCompatibilidad extends Controller
{


    public function index() {

        $farmacos = Farmaco::select('id', 'name')->get();
        $compatibilidads = Compatibilidad::select('id', 'name', 'colors')->get();

        return view('FarmaCompatibildiad.index', compact('farmacos', 'compatibilidads'));
    }


    public function store(FarmaCompatibilidadRequest $request){

        $farmaco1 = $request->input('first_farmaco');
        $farmaco2 = $request->input('second_farmaco');

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

        if($resp) {
            return response()->json(['message' => 'Ya existe esta combinacion']);
        }

        $row = FarmacoCompatibilidad::create($request->all());

        return view('FarmaCompatibildiad.succes', compact('row'));

    }

    public function checkindex(){

        $farmacos = Farmaco::select('id', 'name')->get();
        $compatibilidads = Compatibilidad::select('id', 'name', 'colors')->get();
        return view('FarmaCompatibildiad.check', compact('farmacos', 'compatibilidads'));


    }

    public function compatibility(Request $request) {

         $compatibilidad = FarmacoCompatibilidad::where('first_farmaco', $request->first_farmaco)
                                                    ->where('second_farmaco', $request->second_farmaco)
                                                    ->with('compatibilidad')
                                                    ->first();


        return view('FarmaCompatibildiad.checksucces', compact('compatibilidad'));

        }


}
