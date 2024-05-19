<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpFoundation\Response;

class CheckProfesional
{
    
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->is('login')) {
            // Si la solicitud es para la página de inicio de sesión, continuar sin verificar el rol
            return $next($request);
        }

        if (!Auth::check()) {
            // Si el usuario no está autenticado, redirigir a la página de inicio de sesión
            return redirect('login');
        }

        $user = Auth::user();
        $roleName = 'Profesional'; // El nombre del rol que queremos verificar

        // Buscar el rol 'Paciente' en la base de datos
        $role = Role::where('name', $roleName)->first();


        // Verificar si el usuario tiene el rol buscado
        if ($role &&!$user->roles->contains($role)) {
            abort(403); // Forbidden
        }

        return $next($request);
    
    }
}
