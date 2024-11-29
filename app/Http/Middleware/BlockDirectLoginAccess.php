<?php

namespace App\Http\Middleware;

use Closure;

class BlockDirectLoginAccess
{
    public function handle($request, Closure $next)
    {
        $referer = $request->headers->get('referer');

        if (empty($referer) || !str_contains($referer, $request->getHost())) {
            return redirect()->route('block');
        }

        return $next($request);
    }
}
