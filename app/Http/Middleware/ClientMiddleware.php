<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClientMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user()->hasRole('client') || auth()->user()->hasRole('admin')) {
            return $next($request);
        }
        
        return redirect()->back()->with('error', 'Vous n\'avez pas la permission d\'accéder à cette ressource.');
    }
}
