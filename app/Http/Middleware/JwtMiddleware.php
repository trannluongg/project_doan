<?php

namespace App\Http\Middleware;

use App\Core123\Auth\AuthMe;
use Closure;
use Exception;
use Illuminate\Support\Facades\Config;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class JwtMiddleware extends BaseMiddleware
{
    public function __construct(\Tymon\JWTAuth\JWTAuth $auth)
    {
        parent::__construct($auth);
    }

    public function handle($request, Closure $next)
    {
        try
        {
            Config::set('auth.defaults.guard', 'admins');
            JWTAuth::setToken(AuthMe::token('admins'))->toUser();
        }
        catch (Exception $e)
        {
            return redirect()->route('get.admin.login');
//            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException)
//            {
//                return response()->json(['message' => 'Token is Invalid', 'status_code' => 401])->setStatusCode(401);
//            }
//            else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException)
//            {
//                return response()->json(['message' => 'Token is Expired', 'status_code' => 401])->setStatusCode(401);
//            }
//            else if($e instanceof \Tymon\JWTAuth\Exceptions\JWTException)
//            {
//                return response()->json(['message'=> $e->getMessage(), 'status_code' => 401])->setStatusCode(401);
//            }
//            else if ($e instanceof  \Tymon\JWTAuth\Exceptions\TokenBlacklistedException)
//            {
//                return response()->json(['message'=> 'token has been blacklisted', 'status_code' => 401])->setStatusCode(401);
//            }else
//            {
//                return response()->json(['message' => 'Authorization Token not found', 'status_code' => 401])->setStatusCode(401);
//            }
        }
        return $next($request);
    }

}
