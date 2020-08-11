<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 29/06/2020
 * Time: 23:52
 */

namespace Modules\Admin\Http\Controllers;


use Illuminate\Http\Request;
use Modules\Admin\Services\AdminAuthService;
use Modules\Admin\Services\BillService;
use Modules\Admin\Services\ModuleGroupService;
use Modules\Admin\Services\UserService;

class DashboardController extends Controller
{
    private $moduleGroupService;
    private $adminAuthService;
    private $userService;
    private $billService;

    public function __construct(ModuleGroupService $moduleGroupService,
                                AdminAuthService $adminAuthService,
                                UserService $userService,
                                BillService  $billService)
    {
        $this->adminAuthService = $adminAuthService;
        $this->moduleGroupService = $moduleGroupService;
        $this->userService = $userService;
        $this->billService = $billService;
        parent::__construct();
    }

    public function index(Request $request)
    {
        $data_module_group = $this->moduleGroupService->getList($request);
        $data_module_group = json_decode($data_module_group->content(), 1);

        $modules_group_menu = $this->getAllModule($data_module_group);

        $admin = $this->adminAuthService->getAdmin();
        $admin_permission = $this->getAdminPermissions($admin);

        $user = $this->userService->getList($request)->getContent();
        $user = json_decode($user, 1);
        $user_count = count($user['data']);

        $bill = $this->billService->getList($request)->getContent();
        $bill = json_decode($bill, 1);
        $bill_count = count($bill['data']);

        return view('admin::pages.dashboard.index', compact(
            'modules_group_menu',
            'admin_permission',
            'user_count',
            'bill_count'));
    }
}
