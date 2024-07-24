<?php

namespace App\Http\Middleware;

use App\Http\Services\ApiResponse;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckTrialPeriod
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $user = Auth::user();
        
        if($user && is_null($user->trial_ends_at)) return $next($request);

        if(!Carbon::parse($user->trial_ends_at)->gte(Carbon::now())) {
            return ApiResponse::error('Su periodo de prueba a finalizado', []);
        }
        
        return $next($request);
    }
}
