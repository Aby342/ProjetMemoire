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
    if (!Auth::check()) {
        return response()->json(['message' => 'Veuillez vous connecter.'], 401);
    }

    $user = Auth::user();

    if ($role && $user->role !== $role) {
        return response()->json(['message' => 'Accès refusé : rôle non autorisé.'], 403);
    }

    return $next($request);
}

}
