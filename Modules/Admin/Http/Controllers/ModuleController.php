<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 18/06/2020
 * Time: 23:16
 */

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Admin\Http\Requests\Module\ModuleCreateRequest;
use Modules\Admin\Http\Requests\Module\ModuleEditRequest;
use Modules\Admin\Services\AdminAuthService;
use Modules\Admin\Services\ModuleGroupService;
use Modules\Admin\Services\ModuleService;
use Modules\Admin\Services\PermissionService;

class ModuleController extends Controller
{
    private $moduleService;
    private $permissionService;
    private $moduleGroupService;
    private $adminAuthService;

    public function __construct(ModuleService $moduleService,
                                PermissionService $permissionService,
                                ModuleGroupService $moduleGroupService,
                                AdminAuthService $adminAuthService)
    {
        $this->moduleService = $moduleService;
        $this->permissionService = $permissionService;
        $this->moduleGroupService = $moduleGroupService;
        $this->adminAuthService = $adminAuthService;
        parent::__construct();
    }

    public function index(Request $request)
    {
        $data = $this->moduleService->getList($request);
        $data = json_decode($data->content(), 1);
        $data_module = $data['data'];
        $paginate = $data['meta']['pagination'];

        $data_permission = $this->permissionService->getList($request);
        $data_permission = json_decode($data_permission->content(), 1);
        $data_permission = $data_permission['data'];

        $data_module_group = $this->moduleGroupService->getList($request);
        $data_module_group = json_decode($data_module_group->content(), 1);

        $modules_group_menu = $this->getAllModule($data_module_group);

        $data_module_group = $data_module_group['data'];

        $admin = $this->adminAuthService->getAdmin();
        $admin_permission = $this->getAdminPermissions($admin);


        return view('admin::pages.module.index', compact('data_module', 'admin_permission', 'modules_group_menu', 'data_permission', 'data_module_group','paginate'));
    }

    public function store(ModuleCreateRequest $request)
    {
        $data = $this->moduleService->create($request);
        return $data;
    }

    public function getModule($id)
    {
        $data = $this->moduleService->show($id);
        $data = json_decode($data->content(), 1);
        return $data;
    }

    public function editModule(ModuleEditRequest $request, $id)
    {
        $data = $this->moduleService->edit($request, $id);
        $data = json_decode($data->content(), 1);
        return $data;
    }
}
