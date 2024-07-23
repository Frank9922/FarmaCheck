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
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class AuthService {

    public static function login($request) : mixed {

        
        if(!$email = User::where('email', $request['email'])->first()) return ApiResponse::error('No esta registrado este email');

        if(!Auth::attempt($request->all())) return false;

        $user = Auth::user();

        $token = $user->createToken('token')->plainTextToken;

        return ['user' => $user, 'token' => $token];

    }

    public static function createUsuario(RegisterRequest $request) : User {


    
        $user = User::create([
            'name'  => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'trial_ends_at' => Carbon::now()->addDays(7),
        ]);

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'image/svg+xml'
        ])->get('https://ui-avatars.com/api/?name=John+Doe?background=random');

        if($response->ok()) {
            $avatar = $response->body();
            $path = Storage::putFile('avatars', $avatar);
            dd($path);
        }

        SendEmailRegistration::dispatch($user);

        return $user;
         
    }


    public static function logout(Request $request) : JsonResponse {

        if($request->user()->currentAccessToken()->delete()) return ApiResponse::success([], 'Logout successful');

    }


}

?>