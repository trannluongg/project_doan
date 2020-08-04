<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 07/06/2020
 * Time: 14:07
 */

namespace App\Http\Controllers\Product;


use App\Http\Controllers\Controller;

class PhoneController extends Controller
{
    public function index()
    {
        return view('pages.product.index');
    }
}
