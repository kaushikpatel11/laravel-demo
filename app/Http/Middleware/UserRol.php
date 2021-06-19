<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use App\Owner;
use App\Retails;
use Illuminate\Support\Facades\Auth;

class UserRol
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
        if ($user->type == "owner") {
            return redirect('/owner/dashboard');
        } elseif ($user->type == "admin") {
            return redirect('/admin/dashboard');
        } else {
            return redirect('/real_estate/dashboard');
        }
    
    }
}
