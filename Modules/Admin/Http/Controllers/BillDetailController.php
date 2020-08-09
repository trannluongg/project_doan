<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 22/06/2020
 * Time: 23:27
 */

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Admin\Services\BillDetailService;

class BillDetailController extends Controller
{
    private $billDetailService;

    public function __construct(BillDetailService $billDetailService)
    {
        $this->billDetailService = $billDetailService;
        parent::__construct();
    }

    public function updateBillDetail(Request $request)
    {
        return $this->billDetailService->updateBillDetail($request);
    }

    public function removeProductBill(Request $request)
    {
        return $this->billDetailService->removeProductBillDetail($request);
    }
}
