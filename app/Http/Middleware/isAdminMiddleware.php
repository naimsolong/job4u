<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class isAdminMiddleware
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
        $user = Auth::user();

        switch($user->role_id) {
            case 1 :
                return $next($request);
                break;
            case 2 :
                return $next($request);
                break;
            case 3 :
                return $next($request);
                break;

            default:
                return response()->view('errors.404');
        }

        
    }
}
