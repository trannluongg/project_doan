<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 18/06/2020
 * Time: 23:16
 */

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Admin\Http\Requests\Permission\PermissionCreateRequest;
use Modules\Admin\Http\Requests\Permission\PermissionEditRequest;
use Modules\Admin\Services\AdminAuthService;
use Modules\Admin\Services\ModuleGroupService;
use Modules\Admin\Services\ModuleService;
use Modules\Admin\Services\PermissionService;

class PermissionController extends Controller
{
    private $permissionService;
    private $moduleService;
    private $moduleGroupService;
    private $adminAuthService;

    public function __construct(PermissionService $permissionService,
                                ModuleService $moduleService,
                                ModuleGroupService $moduleGroupService,
                                AdminAuthService $adminAuthService)
    {
        $this->permissionService = $permissionService;
        $this->moduleService = $moduleService;
        $this->adminAuthService = $adminAuthService;
        $this->moduleGroupService = $moduleGroupService;
        parent::__construct();
    }

    public function index(Request $request)
    {
        $data = $this->permissionService->getList($request);
        $data = json_decode($data->content(), 1);
        $data_permission = $data['data'];

        $data_module = $this->moduleService->getList($request);
        $data_module = json_decode($data_module->content(), 1);
        $data_module = $data_module['data'];


        $data = $this->moduleGroupService->getList($request);
        $data = json_decode($data->content(), 1);

        $modules_group_menu = $this->getAllModule($data);

        $admin = $this->adminAuthService->getAdmin();
        $admin_permission = $this->getAdminPermissions($admin);

        $paginate = $data['meta']['pagination'];
        return view('admin::pages.permission.index', compact('data_permission','modules_group_menu', 'admin_permission', 'data_module', 'paginate'));
    }

    public function store(PermissionCreateRequest $request)
    {
        $data = $this->permissionService->create($request);
        return $data;
    }

    public function getPermission($id)
    {
        $data = $this->permissionService->show($id);
        $data = json_decode($data->content(), 1);
        return $data;
    }

    public function editPermission(PermissionEditRequest $request, $id)
    {
        $data = $this->permissionService->edit($request, $id);
        $data = json_decode($data->content(), 1);
        return $data;
    }
}
