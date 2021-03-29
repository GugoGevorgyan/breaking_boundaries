<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SuperAdmin
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
        if(auth()->user() && (auth()->user()->role->name === 'superAdmin') ){

            return $next($request);
        }
        return response()->json(['error'=>'you are not an superAdmin']);
    }
}
