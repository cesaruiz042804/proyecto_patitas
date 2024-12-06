<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SessionAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
         // Verificar si hay un usuario autenticado
         if (!session()->has('admin_user')) {

            $currentRoute = $request->route()->getName();

            // Definir los mensajes de errores según la ruta
            $errorMessage = 'Debes haber iniciado sesión.';

            // Al almacena la ruta actual, entonces cuando se logue, te envía hacia allá
            session(['intended_url' => $request->url()]);

            // Almacena el ID del usuario en una variable de la solicitud
            return redirect()->route('admin.login.session')->withErrors($errorMessage);
        }

        $request->attributes->set('admin_user', session('admin_user'));
        return $next($request); // Continuar con la solicitud
    }
}
