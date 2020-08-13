<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 8/8/2020
 * Time: 12:07 AM
 */

namespace App\Http\Middleware;


use App\Core123\Auth\AuthMe;
use Closure;
use Exception;
use Illuminate\Support\Facades\Config;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class  JwtUserMiddleware extends BaseMiddleware
{
    public function __construct(\Tymon\JWTAuth\JWTAuth $auth)
    {
        parent::__construct($auth);
    }

    public function handle($request, Closure $next)
    {
        try
        {
            Config::set('auth.defaults.guard', 'users');
            JWTAuth::setToken(AuthMe::token('users'))->toUser();
        }
        catch (Exception $e)
        {
            return redirect()->route('get.user.home');
        }
        return $next($request);
    }

}
