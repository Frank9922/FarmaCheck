<?php

namespace App\Http\Controllers;

use App\Http\Services\ApiResponse;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;


class IaController extends Controller
{
    public function getText(string $farmaco1, string $farmaco2)  {

        $url = env('GROQ_API_URL');

        $body = [
            "messages" => [
                [
                    "role" => "user",
                    "content" => "Proporciona una respuesta concisa y objetiva sobre los riesgos y beneficios de combinar ". $farmaco1 . " Y ". $farmaco2 
                ]
            ],
            "model" => env('GROQ_MODEL')
        ];

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . env('GROQ_API_KEY')
        ])->post($url, $body); 


        if(!$response->ok()) return ApiResponse::error('Error al obtener la respuesta de la IA');

        $data = $response->json();

        return ApiResponse::success(['text' => $data['choices'][0]['message']['content'], 'body' => 'La combinacion fue: '.$farmaco1. ' y '. $farmaco2]);

    }
}
