<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 15/06/2020
 * Time: 22:54
 */

namespace Modules\Admin\Http\Controllers;


use App\Core123\Auth\AuthMe;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Modules\Admin\Http\Requests\AdminLoginRequest;
use Modules\Admin\Services\AdminAuthService;
use Tymon\JWTAuth\Facades\JWTAuth;

class AdminAuthController extends Controller
{
    private $adminAuthService;

    public function __construct(AdminAuthService $adminAuthService)
    {
        $this->adminAuthService = $adminAuthService;
        parent::__construct();
    }

    public function index()
    {
        if (Auth::guard('admins')->user())
        {
            return redirect()->route('get.admin.dashboard');
        }

        if (!empty(AuthMe::token('admins')) && JWTAuth::setToken(AuthMe::token('admins'))->toUser())
        {
            return redirect()->route('get.admin.dashboard');
        }

        return view('admin::login');
    }

    public function postLogin(AdminLoginRequest $request)
    {
        $result = $this->adminAuthService->postLogin($request);

        if ($result->getStatusCode() === Response::HTTP_OK)
        {
            return redirect()->route('get.admin.dashboard');
        }
        return view('admin::login');
    }

    public function refresh()
    {
        return $this->adminAuthService->refresh();
    }

    public function logout()
    {
        $this->adminAuthService->logout();
        return redirect()->route('get.admin.login');
    }
}
