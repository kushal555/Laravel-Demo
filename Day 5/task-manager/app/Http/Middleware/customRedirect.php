<?php

namespace App\Http\Middleware;

use Closure;

class customRedirect
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
            return redirect('tasks');
        }
        flash('alert-danger','You have to logged in');
        return $next($request);
    }
}
