<?php

namespace App\Http\Middleware;

use App\Builder\ReturnApi;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $type = 'VOLUNTÁRIO'): Response
    {
        $types = explode('|', $type);

        foreach($types as $row) 
            if($row != 'ADMINISTRADOR' && $row != 'GESTÃO' && $row != 'VOLUNTÁRIO')
                return ReturnApi::error("Tipo de usuário inválido.", null, 401);

        foreach ($types as $type) {
            $user = User::find(Auth::id())->load($type);
            if($user->admin)
                return $next($request);
            
            if($user->$type) {
                request()->merge([$type => $user->$type]);
                return $next($request);
            }
        }
        
        return ReturnApi::error("Não autorizado.", null, 401);
    }
}
