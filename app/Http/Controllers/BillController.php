<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 06/08/2020
 * Time: 20:00
 */

namespace App\Http\Controllers;


use App\Core123\Auth\AuthMe;
use App\Services\BillService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Tymon\JWTAuth\Facades\JWTAuth;

class BillController extends Controller
{
    private $billService;

    public function __construct(BillService $billService)
    {
        parent::__construct();
        $this->billService = $billService;
    }

    public function order(Request $request)
    {
        $user = null;

        if (AuthMe::token('users'))
        {
            Config::set('auth.defaults.guard', 'users');
            $user = JWTAuth::setToken(AuthMe::token('users'))->toUser();
        }
        $data = $this->billService->order($request);
        if ($data && $user) return redirect()->route('get.user.get_purchase', ['id' => $user->id]);
        elseif ($data && !$user) return redirect()->route('get.user.home');
        else return abort(404);
    }
}
