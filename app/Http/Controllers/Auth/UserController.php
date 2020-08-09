<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 09/06/2020
 * Time: 22:55
 */

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Http\Requests\UserUpdateRequest;
use App\Services\AuthService;
use App\Services\BillService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $billService;
    private $authService;

    public function __construct(BillService $billService,
                                AuthService $authService)
    {
        parent::__construct();
        $this->billService = $billService;
        $this->authService = $authService;
    }

    public function index()
    {
        return view('pages.user_info.index');
    }

    public function purchase($id)
    {
        $bills = $this->billService->getBillToUser($id);

        return view('pages.user_purchase.index', compact('bills'));
    }

    public function updateInfo(UserUpdateRequest $request, $id)
    {
        return $this->authService->updateInfo($request, $id);
    }

    public function updateAvatar(Request $request, $id)
    {
        return $this->authService->updateAvatar($request, $id);
    }

    public function updateBillCancel(Request $request, $id)
    {
        return $this->billService->updateStatusBill($request, $id);
    }

    public function updateBillAgain(Request $request, $id)
    {
        return $this->billService->updateStatusBill($request, $id);
    }

    public function password()
    {
        return view('pages.user_password.index');
    }

    public function updatePassword(Request $request, $id)
    {
        return $this->authService->updatePassword($request, $id);
    }
}
