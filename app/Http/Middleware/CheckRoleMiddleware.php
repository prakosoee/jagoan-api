<?php

namespace App\Http\Middleware;

use App\Helper\ApiResponse;
use Closure;
use Illuminate\Http\Request;

class CheckRoleMiddleware
{
    public function handle(Request $request, Closure $next, $role1, $role2)
    {
        $user = auth()->user();

        if (!$user->hasRole($role1) && !$user->hasRole($role2)) {
            return ApiResponse::response('Role Tidak Sesuai');
        }
        return $next($request);
    }
}
