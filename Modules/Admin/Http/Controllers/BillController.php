<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 22/06/2020
 * Time: 23:27
 */

namespace Modules\Admin\Http\Controllers;


use Illuminate\Http\Request;
use Modules\Admin\Http\Requests\Bill\BillEditRequest;
use Modules\Admin\Services\AdminAuthService;
use Modules\Admin\Services\BillDetailService;
use Modules\Admin\Services\BillService;
use Modules\Admin\Services\ModuleGroupService;

class BillController extends Controller
{
    private $billService;
    private $moduleGroupService;
    private $adminAuthService;
    private $billDetailService;

    public function __construct(BillService $billService,
                                ModuleGroupService $moduleGroupService,
                                AdminAuthService $adminAuthService,
                                BillDetailService $billDetailService)
    {
        $this->billService          = $billService;
        $this->moduleGroupService   = $moduleGroupService;
        $this->adminAuthService     = $adminAuthService;
        $this->billDetailService    = $billDetailService;

        parent::__construct();
    }

    public function index(Request $request)
    {
        $data = $this->billService->getList($request);
        $data = json_decode($data->content(), 1);
        $data_bills = $data['data'];
        $paginate = $data['meta']['pagination'];

        $data_module_group = $this->moduleGroupService->getList($request);
        $data_module_group = json_decode($data_module_group->content(), 1);

        $modules_group_menu = $this->getAllModule($data_module_group);

        $admin = $this->adminAuthService->getAdmin();
        $admin_permission = $this->getAdminPermissions($admin);



        return view('admin::pages.bill.index', compact(
            'data_bills',
            'modules_group_menu',
            'admin_permission',
            'paginate'));
    }

    public function updateBillStatus(Request $request, $id)
    {
        return $this->billService->updateBillStatus($request, $id);
    }

    public function getBill($id)
    {
        return $this->billService->show($id);
    }

    public function editBill(BillEditRequest $request, $id)
    {
        return $this->billService->edit($request, $id);
    }

    public function getBillDetail($id)
    {
        return $this->billDetailService->getBillDetailId($id);
    }
}
