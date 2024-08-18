<?php

namespace App\Http\Controllers;

use App\Http\Services\ApiResponse;
use App\Models\Farmaco;
use Illuminate\Http\Request;

class FarmaController extends Controller
{
    public function store(Request $request){
        // dd(
        //     $request->all()
        // );
        
        $validatedData = $request->validate([
            'name' => ['required','string','max:255'],
            'label' => ['required','string','max:255'],
        ]);
        if($validatedData)
            {    
                $newFarmaco=Farmaco::create($validatedData);
                
                return ApiResponse::success(['Farmaco' => $newFarmaco]);
            }
    }
}
