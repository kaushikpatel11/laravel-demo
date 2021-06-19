<?php

namespace App\Http\Middleware;

use Closure;

class RealEstateActive
{
    //middleware para comprobrar en caso de ser inmobiliaria, que esta activa
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {


        return $next($request);
    }
}
