<?php 
namespace App\Http\Services;

use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Jobs\SendEmailRegistration;
use App\Jobs\SendResetPassword;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\FlareClient\Api;

class AuthService {

    public static function login($request) : mixed {

        
        if(!$email = User::where('email', $request['email'])->first()) return ApiResponse::error('No esta registrado este email');

        if(!Auth::attempt($request->all())) return false;

        $user = Auth::user();

        $token = $user->createToken('token')->plainTextToken;

        return ['user' => $user, 'token' => $token];

    }


    public static function loginAdmin($request) : mixed {

        if(!$email = User::where('email', $request['email'])->first()) return false;

        if(!Auth::attempt($request->all())) return false;

        $user = Auth::user();

        if(!$user->role === 'admin') return false;

        $token = $user->createToken('token_admin')->plainTextToken;

        return ['user' => $user, 'token' => $token, 'isAdmin' => true];

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

    public static function sendReset(ResetPasswordRequest $request) : JsonResponse {


        if(!$user = User::where('email', $request->input('email'))->first()) return ApiResponse::error('no se encontro el user');

        try {

            $token = $user->assignResetToken();

            SendResetPassword::dispatch($user, $token);

            return ApiResponse::success(['token' => $token, 'user' => $user]);


        } catch(Exception $e) {
            
            return ApiResponse::error($e);

        }

    }

    public static function changePassword(ChangePasswordRequest $request, string $token) : JsonResponse {

        if(!$user = User::where('remember_token', $token)->first()) return ApiResponse::error('Token no valido');

        $user->password = $request->input('password');

        $user->remember_token = null;

        $user->save();

        return ApiResponse::success(['user' => $user]);
    }
}

?>