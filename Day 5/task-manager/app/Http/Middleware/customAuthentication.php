<?php

namespace App\Http\Middleware;

use Closure;

class customAuthentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(session('user')){
            flash('alert-danger','You already logged in');
            return $next($request);
        }
        return redirect()->route('user.login');
    }
}
