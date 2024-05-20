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
            
            return $next($request);
        }

        if (!Auth::check()) {
          
            return redirect('login');
        }

        $user = Auth::user();
        $roleName = 'Profesional';

       
        $role = Role::where('name', $roleName)->first();


        
        if ($role &&!$user->roles->contains($role)) {
            return redirect()->route('nofound.index');
        }

        return $next($request);
    
    }
}
