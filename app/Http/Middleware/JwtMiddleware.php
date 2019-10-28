<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;
use Exception;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;

class JwtMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (Exception $e) {
            if ($e instanceof TokenInvalidException) {
                return response()->json([
                    'code' => 401,
                    'msg' => 'Token is Invalid',
                    'data' => [],
                ]);
            } elseif ($e instanceof TokenExpiredException) {
                return response()->json([
                    'code' => 401,
                    'msg' => 'Token is Expired',
                    'data' => [],
                ]);
            } else {
                return response()->json([
                    'code' => 401,
                    'msg' => 'Authorization Token not found',
                    'data' => [],
                    ]);
            }
        }
        return $next($request);
    }
}
