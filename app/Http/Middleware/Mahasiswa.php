<?php

namespace App\Http\Middleware;

use Closure;

class Mahasiswa
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
         if(auth()->check() && $request->user()->level != 'Mahasiswa'){
           abort(403);
        }
        return $next($request);
    }
}
