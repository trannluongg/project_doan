<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

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
        return $this->authService->postLogin($request);
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
