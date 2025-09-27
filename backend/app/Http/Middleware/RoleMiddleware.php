<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    /**
     * Vérifie si l'utilisateur a un rôle donné.
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = $request->user();

        if (!$user || !in_array($user->role, $roles)) {
            return response()->json([
                'message' => 'Accès refusé. Rôle requis : ' . implode(', ', $roles)
            ], 403);
        }

        return $next($request);
    }
}
