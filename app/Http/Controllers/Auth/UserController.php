<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 09/06/2020
 * Time: 22:55
 */

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        return view('pages.user_info.index');
    }

}
