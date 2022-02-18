<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminAuth
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
        if (session()->get('vK68TF23TfYKYDBZSCC9') == 1) {
            $request['admin'] = session()->get('admin');
            return $next($request);
        }
        return redirect()->route('login')->withErrors('Not authorized!');
    }
}
