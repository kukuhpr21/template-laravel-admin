<?php

namespace App\Http\Middleware;

use App\Services\Session\SessionService;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Auth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $sessionService = new SessionService();

        if ($sessionService->isExist()) {

            return $next($request);
        }
        return redirect()->route("login");
    }
}
