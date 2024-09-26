<?php 
namespace App\Http\Services;

use App\Http\Requests\RegisterRequest;
use App\Jobs\SendEmailRegistration;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService {

    public static function login($request) : mixed {

        
        if(!$email = User::where('email', $request['email'])->first()) return ApiResponse::error('No esta registrado este email');

        if(!Auth::attempt($request->all())) return false;

        $user = Auth::user();

        $token = $user->createToken('token')->plainTextToken;

        return ['user' => $user, 'token' => $token];

    }

    public static function createUsuario(RegisterRequest $request) : array {

        $response = ['errorLogin' => false, 'error' => false];

        $newUser = User::create([
            'name'  => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'trial_ends_at' => Carbon::now()->addDays(7),
            'profile_picture' => 'https://ui-avatars.com/api/?name=' .$request->name. '?background='. fake()->hexColor(). ''
        ]);



        SendEmailRegistration::dispatch($newUser);

        try{ 

            if(!Auth::attempt($request->only('email', 'password'))) return $response['errorLogin'] = 'No pudo loguearse, intente de nuevo';

            $user = Auth::user();

            $token = $user->createToken('token')->plainTextToken;

            $response['token'] = $token;
            $response['user'] = $user;

            return $response;

        }

        catch(Exception $e) {
            $response['error'] = 'No pudo loguearse, intente de nuevo';
            return $response;
        }         
    }


    public static function logout(Request $request) : JsonResponse {

        if($request->user()->currentAccessToken()->delete()) return ApiResponse::success([], 'Logout successful');

    }


}

?>