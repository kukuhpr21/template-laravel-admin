<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Services\Session\SessionService;
use Symfony\Component\HttpFoundation\Response;

class EnsureSessionIsValid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $unprotectedPath = ['login'];
        $sessionService = new SessionService();

        if ($sessionService->isExist()) {
            if (in_array($request->path(), $unprotectedPath)) {
                return redirect()->route("dashboard");
            }

            if (!empty($sessionService->get('temp_role'))) {

                if ($request->path() != 'choose-role') {

                    return redirect()->route('choose-role');
                }
            }

            return $next($request);
        }

        if (in_array($request->path(), $unprotectedPath)) {
            return $next($request);
        }
        return redirect()->route("login");
    }
}
