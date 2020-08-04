<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    private $authService;

    public function __construct(AuthService $authService)
    {
        parent::__construct();
        $this->authService = $authService;
    }

    public function register()
    {
        return view('pages.register.index');
    }

    public function postRegister(UserRegisterRequest $request)
    {
        return $this->authService->register($request);
    }
}
