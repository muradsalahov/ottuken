<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserType
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $user_type = Auth::user()->user_type;

            if ($user_type == 1) {
                return $next($request);
            } 
            else {
                abort(404);
            }
        } else {
            return redirect('/login');
        }
    }
}