<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class UserAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = User::whereToken($request->bearerToken())->whereNotNull('phone_verified_at')->first();
        if (!$user) {
            return response()->json([
                'message'   =>  'User not found!',
            ], 400);
        }
        $request['user'] = $user;
        return $next($request);
    }
}
