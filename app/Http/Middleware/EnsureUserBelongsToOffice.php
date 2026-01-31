<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserBelongsToOffice
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if (! $user) {
            return $next($request);
        }

        foreach ($request->route()->parameters() as $param) {
            if (
                is_object($param)
                && method_exists($param, 'getAttribute')
                && $param->getAttribute('office_id') !== null
            ) {
                if ($param->office_id !== $user->office_id) {
                    abort(403);
                }
            }
        }

        return $next($request);
    }
}
