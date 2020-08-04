<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 22/06/2020
 * Time: 23:27
 */

namespace Modules\Admin\Http\Controllers;

use Modules\Admin\Services\BillDetailService;

class BillDetailController extends Controller
{
    private $billDetailService;

    public function __construct(BillDetailService $billDetailService)
    {
        $this->billDetailService = $billDetailService;
        parent::__construct();
    }
}
