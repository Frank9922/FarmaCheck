<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Farmaco;
use App\Models\Compatibilidad;

class FarmaCompatibilidad extends Controller
{


    public function index() {

        $farmacos = Farmaco::select('id', 'name')->get();
        $compatibilidads = Compatibilidad::select('id', 'name')->get();

        return view('FarmaCompatibildiad.index', compact('farmacos', 'compatibilidads'));
    }


    public function store(Request $request){

        $formulario = $request->only('first_farmaco', 'second_farmaco', 'compatibilidad');

        return response()->json([
            'request' => $formulario
        ]);
    }

    public function compatibility(Request $request) {



        return response()->json([
            'xd' => true
        ]);
    }
}
