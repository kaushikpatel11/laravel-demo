<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Illuminate\Support\Facades\Auth;

class IsRealEstate
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

        //es de tipo owner
        if ($user->type == "real_estate" ) {

            return $next($request);
        } else {
            //ruta no autorizada
            return redirect('/logout');
        }
    }
}
