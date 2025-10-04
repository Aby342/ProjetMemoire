<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Vérifie si l'utilisateur a le rôle requis.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role = null)
    {
        // Vérifie si l'utilisateur est connecté
        if (!Auth::check()) {
            return redirect()->route('login'); // Redirige si non connecté
        }

        $user = Auth::user();

        // Si un rôle est passé en paramètre et que l'utilisateur n'a pas ce rôle
        if ($role && $user->role !== $role) {
            abort(403, 'Accès refusé : rôle non autorisé.');
        }

        return $next($request);
    }
}
