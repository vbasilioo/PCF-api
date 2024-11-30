<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Log;
use Symfony\Component\HttpFoundation\Response;

class LogActionsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        if(Auth::check()){
            Log::create([
                'user_id' => Auth::id(),
                'route' => $request->path(),
                'method' => $request->method(),
                'data' => $request->except(['password']),
                'message' => 'Ação registrada automaticamente pelo sistema.',
            ]);
        }

        return $response;
    }
}
