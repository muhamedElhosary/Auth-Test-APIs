<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckPermissions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$abilities)
    {
        $user = $request->user();
        foreach ($abilities as $ability) {
            if ($user->tokenCan($ability)) {
                 return $next($request);
            }
        }

        return response()->json(['message' => 'Not allowed'], 403);

    }
}
