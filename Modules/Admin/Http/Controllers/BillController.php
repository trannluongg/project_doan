<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 22/06/2020
 * Time: 23:27
 */

namespace Modules\Admin\Http\Controllers;


use Modules\Admin\Services\BillService;

class BillController extends Controller
{
    private $billService;

    public function __construct(BillService $billService)
    {
        $this->billService = $billService;
        parent::__construct();
    }
}
