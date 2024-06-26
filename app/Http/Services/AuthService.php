<?php 
namespace App\Http\Services;

use App\Http\Requests\RegisterRequest;
use App\Jobs\SendEmailRegistration;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService {

    public static function login() : JsonResponse {

        $user = Auth::user();

        $token = $user->createToken('token')->plainTextToken;

        return ApiResponse::success(['token' => $token, 'user' => $user], 'Authorization successful');

    }

    public static function createUsuario(RegisterRequest $request) : User {

        $user = User::create([
            'name'  => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'trial_ends_at' => Carbon::now()->addDays(7),
        ]);


        SendEmailRegistration::dispatch($user);

         return $user;

    }

    public static function logout(Request $request) : JsonResponse {

        if($request->user()->currentAccessToken()->delete()) return ApiResponse::success([], 'Logout successful');

    }


}

?>