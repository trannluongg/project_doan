<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 06/08/2020
 * Time: 20:00
 */

namespace App\Http\Controllers;


use App\Services\BillService;
use Illuminate\Http\Request;

class BillController
{
    private $billService;

    public function __construct(BillService $billService)
    {
        $this->billService = $billService;
    }

    public function order(Request $request)
    {
        $data = $this->billService->order($request);
        if ($data) return redirect()->route('get.user.home');
        return abort(404);
    }
}
