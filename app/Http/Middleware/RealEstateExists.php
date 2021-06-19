<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Illuminate\Support\Facades\Auth;

class RealEstateExists
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
        $real_estate = User::find(Auth::id())->real_estate;
        if ($real_estate == null)
            return redirect("/real_estate/create");
        else
            return $next($request);
    }
}
