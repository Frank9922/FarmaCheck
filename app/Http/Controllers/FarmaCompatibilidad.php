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
