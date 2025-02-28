<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateAdmin extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('login');
    }
	
	// On override la méthode d'authentification du middleware pour rajouter la vérification du rôle admin
    protected function authenticate($request, array $guards)
    {
		// Si utilisateur non connecté ou pas admin, on redirige vers la page login ou mon compte
		if (is_null(Auth::user()) || !Auth::user()->isAdmin) {
			$this->unauthenticated($request, $guards);
		}
		
        if (empty($guards)) {
            $guards = [null];
        }

        foreach ($guards as $guard) {
            if ($this->auth->guard($guard)->check()) {
                return $this->auth->shouldUse($guard);
            }
        }

        $this->unauthenticated($request, $guards);
    }
}
