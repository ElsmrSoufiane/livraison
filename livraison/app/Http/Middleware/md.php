<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class md
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,$role): Response
    {
        if(!auth()->check()){
            return redirect('/connecter')->with('error', 'Vous devez vous connecter pour accéder à cette ressource');
        }
        if(auth()->user()->role != $role){
            return redirect('/')->with('error', 'Vous n\'avez pas accès à cette ressource');
        }
        return $next($request);
    }
}
