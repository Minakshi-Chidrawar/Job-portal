<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use App\User;

class Seeker
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
        if(Auth::check() && Auth::user()->user_type=='seeker')
        {
            return $next($request);
        }
        else
        {
            return redirect('/');
        }
    }
}
