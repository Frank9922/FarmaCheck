<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Services\ApiResponse;
use App\Http\Services\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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

    public function loginAdmin(LoginRequest $request) : JsonResponse {


        $response = AuthService::loginAdmin($request);

        if(!$response) return ApiResponse::error('Email and password do no match');

        return ApiResponse::success($response);

    }

    public function logout(Request $request) : JsonResponse {

        return AuthService::logout($request);

    }


    public function create(RegisterRequest $request) : JsonResponse {
        
        $resp = AuthService::createUsuario($request);

        if(!$resp['error'] && !$resp['errorLogin']) return ApiResponse::success(['token' => $resp['token'], 'user' => $resp['user']], 'Successfully created', 201);

        return ApiResponse::error($resp['error'], null);

    }


    public function sendReset(ResetPasswordRequest $request) : JsonResponse {

        return AuthService::sendReset($request);

    }

    public function changePassword(Request $request, string $token) : JsonResponse
    {
        return AuthService::changePassword($request, $token);
    }

    

}
