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

use function PHPUnit\Framework\isNull;

class AuthController extends Controller
{

    public function user(Request $request) : JsonResponse {

        if(!$user = $request->user()) return ApiResponse::error('Unathorized', [], 401);

        return ApiResponse::success(['user' => $user], 'User is authenticated', 200);
    }


    public function login(LoginRequest $request) : JsonResponse {

        $response = AuthService::login($request);

        if(!$response) return ApiResponse::error('Email and password do no match');

         return ApiResponse::success($response);
        
    }

    public function logout(Request $request) : JsonResponse {

        return AuthService::logout($request);

    }


    public function create(RegisterRequest $request) : JsonResponse {
        
        $resp = AuthService::createUsuario($request);

        if(!$resp['error'] && !$resp['errorLogin']) return ApiResponse::success(['token' => $resp['token'], 'usuario' => $resp['user']], 'Successfully created', 201);

        return ApiResponse::error($resp['error'], null);

    }
}
