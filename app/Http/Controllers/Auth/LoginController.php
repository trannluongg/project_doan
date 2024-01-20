<?php

namespace App\Http\Controllers\Auth;

use App\Core123\Auth\AuthMe;
use App\Http\Controllers\Controller;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Laravel\Socialite\Facades\Socialite;
use Tymon\JWTAuth\Facades\JWTAuth;

class LoginController extends Controller
{
    private $authService;

    public function __construct(AuthService $authService)
    {
        parent::__construct();
        $this->authService = $authService;
    }

    public function login()
    {
        return view('pages.login.index');
    }

    public function postLogin(Request $request)
    {
        $data = $this->authService->postLogin($request);
        Config::set('auth.defaults.guard', 'users');
		if (AuthMe::token('users')) {
			$user = JWTAuth::setToken(AuthMe::token('users'))->toUser();
			if ($user->status == 2)
			{
				Auth::guard('users')->logout();
				AuthMe::setTokenUser(null);
				return response()->json([], Response::HTTP_UNAUTHORIZED);
			}
		}

        return $data;
    }

    public function logout()
    {
        $this->authService->logout();
        return redirect()->route('get.user.home');
    }

    public function loginGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function loginGoogleCallback(Request $request)
    {
        $response = $this->authService->registerGoogle();
        return redirect()->route('get.user.home');
    }

    public function loginFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function loginFacebookCallback()
    {

        $user = Socialite::driver('facebook')->user();
        dd($user);
    }
}
