<?php

namespace JohnDoe\BlogPackage\Http\Middleware;

use Closure;

class CapitalizeTitle
{
    public function handle($request, Closure $next)
    {
        if ($request->has('title')) {
            $request->merge([
                'title' => ucfirst($request->title)
            ]);
        }

        return $next($request);
    }
}