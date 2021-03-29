<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Admin
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
        if(auth()->user() && (auth()->user()->role->name === 'superAdmin' ||
                auth()->user()->role->name === 'admin') ){
            if (auth()->user()->role_id === 2
                && auth()->user()->status == 0){
                return response()->json(['error'=>'admin is deactivated' ]);
            }
            return $next($request);
        }
        return response()->json(['error'=>'you are not an admin']);
    }
}
