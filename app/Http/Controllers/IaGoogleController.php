<?php

namespace App\Http\Controllers;

use App\Http\Services\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class IaGoogleController extends Controller
{
    public function getText()  {

        $url = env('GOOGLE_IA_ENDPOINT') . '?key=' . env('GOOGLE_IA_API_KEY');


        $response = Http::withHeaders([
            'Content-Type' => 'application/json'
        ])->post($url, 
            [
                'contents' => [
                    'parts' => [
                        'text' => 'Cuentame a modo de informacion, la combinacion de medicamentos ACICLOVIR Y ACIDO TRANEXAMICO'
                    ]
                ]
            ]
    ); 

    if($response->ok()) {
        $data = $response->json();

        $text = $data['candidates'][0]['content']['parts'];

        return ApiResponse::success(['text' => $text['0']['text']]);
    }
    else {
        return response()->json($response, 400);
    }


    }
}
