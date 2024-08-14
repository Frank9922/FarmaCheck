<?php 
namespace App\Http\Services;

use Illuminate\Http\JsonResponse;

class ApiResponse {

    public static function success(?array $data, ?string $message = null, ?int $status = 200) : JsonResponse {

        $response = ['ok' => true];

        if(!is_null($message)) $response['message'] = $message;

        foreach ($data as $key => $value) {
            $response[$key] = $value;
        }

        return response()->json($response, $status);
    
    }

    public static function error(string $message, ?array $data = null, ?int $status = 400) : JsonResponse {

        $response = ['ok' => false, 'message' => $message];

        if(!$data) return response()->json($response, $status);

        foreach ($data as $key => $value) {
            $response[$key] = $value;
        }

        return response()->json($response, $status);
    
    }

}


?>