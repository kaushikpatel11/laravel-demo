<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Illuminate\Support\Facades\Auth;

class Admin
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
        $user = User::find(Auth::id());
        if ($user != null && $user->type == "admin"){
            return $next($request);
        }
        else{

            return redirect('login')->with('error', 'Error: Usuario no autorizado');
        }
    }
}
