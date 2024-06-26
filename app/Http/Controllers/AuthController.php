<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Services\ApiResponse;
use App\Http\Services\AuthService;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function user(Request $request) : JsonResponse {
        return $request->user();
    }


    public function login(LoginRequest $request) : JsonResponse {

        if(!$email = User::where('email', $request['email'])->first()) return ApiResponse::error('No esta registrado este email');

        if(!Auth::attempt($request->all())) return ApiResponse::error('The email and password are invalid') ;

        return AuthService::login();

    }

    public function logout(Request $request) : JsonResponse {

        return AuthService::logout($request);

    }



    public function create(RegisterRequest $request) : JsonResponse {
        
        $user = AuthService::createUsuario($request);

        return ApiResponse::success(['usuario' => $user], 'Successfully created', 201);

    }
}
