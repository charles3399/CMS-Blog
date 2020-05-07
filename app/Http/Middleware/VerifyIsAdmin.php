<?php

namespace App\Http\Middleware;

use Closure;

use App\User;

class VerifyIsAdmin
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
        //If user is not an administrator, user will get redirected back to the original page

        if (!auth()->user()->isAdmin()) 
        {
            return redirect( route('home'));
        }

        return $next($request);
    }
}
