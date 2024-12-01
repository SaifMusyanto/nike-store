<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        // Check user role
        if (request()->user()->role !== 'admin') {
            return response()->json([
                'status' => false,
                'message' => 'Forbidden access',
            ], 403);
        }

        return $next($request);
    }
}
