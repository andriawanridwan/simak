<?php

namespace App\Http\Middleware;

use Closure;

class Dosen
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
        if(auth()->check() && $request->user()->level != 'Dosen'){
           abort(403);
        }
        return $next($request);
    }
}
