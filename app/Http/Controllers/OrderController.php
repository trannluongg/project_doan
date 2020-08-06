<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 06/08/2020
 * Time: 20:00
 */

namespace App\Http\Controllers;


use App\Services\BillService;

class OrderController
{
    public function __construct(BillService $billService)
    {

    }
}
