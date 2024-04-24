<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function user(Request $request) {
        return $request->user();
    }


    public function login(Request $request) {

        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|min:6'
        ]);

        if(!Auth::attempt($credentials)) {

            return response()->json([
                'ok' => false,
                'message' => 'The email and password are invalid'
            ], 400);

        }
        $user = Auth::user();

        $token = $user->createToken('token')->plainTextToken;
        $cookie = cookie('cookie_token', $token, 120, null, 'localhost');


        return response()->json([
            'ok' => true,
            'token' => $token,
            'message' => 'Authorization successful',
            'user' => $user
        ])->withCookie($cookie);



    }

    public function logout(Request $request) {


        if($request->user()->currentAccessToken()->delete()) return response()->json(
            ['ok' => true,
            'message' => 'Logout successful'],
             200);

    }



    public function create(Request $request) {

        $credentials = $request->validate([
            'name'  => 'required|string|max:100',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:8'
        ]);

        $user = User::create([
            'name'  => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);


        return response()->json([
            'message' => 'Successfully created',
            'data' => $user
        ]);


    }
}
