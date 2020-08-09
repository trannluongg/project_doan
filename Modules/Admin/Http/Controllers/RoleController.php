<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 18/06/2020
 * Time: 23:16
 */

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Admin\Http\Requests\Role\RoleCreateRequest;
use Modules\Admin\Http\Requests\Role\RoleEditRequest;
use Modules\Admin\Services\AdminAuthService;
use Modules\Admin\Services\ModuleGroupService;
use Modules\Admin\Services\ModuleService;
use Modules\Admin\Services\RoleService;

class RoleController extends Controller
{
    private $roleService;
    private $moduleService;
    private $moduleGroupService;
    private $adminAuthService;

    public function __construct(RoleService $roleService,
                                ModuleService $moduleService,
                                ModuleGroupService $moduleGroupService,
                                AdminAuthService $adminAuthService)
    {
        $this->roleService = $roleService;
        $this->moduleService = $moduleService;
        $this->moduleGroupService = $moduleGroupService;
        $this->adminAuthService = $adminAuthService;
        parent::__construct();
    }

    public function index(Request $request)
    {
        $data = $this->moduleGroupService->getList($request);
        $data = json_decode($data->content(), 1);

        $modules_group_menu = $this->getAllModule($data);

        $admin = $this->adminAuthService->getAdmin();
        $admin_permission = $this->getAdminPermissions($admin);

        $data = $this->roleService->getList($request);
        $data = json_decode($data->content(), 1);
        $data_role = $data['data'];
        $paginate = $data['meta']['pagination'];

        $data_module = $this->moduleService->getList($request);
        $data_module = json_decode($data_module->content(), 1);
        $data_module = $data_module['data'];


        return view('admin::pages.role.index', compact('data_role',
            'data_module',
            'modules_group_menu',
            'admin_permission',
            'paginate'));
    }

    public function store(RoleCreateRequest $request)
    {
        $data = $this->roleService->create($request);
        return $data;
    }

    public function getRole(Request $request, $id)
    {
        $data = $this->roleService->findOneBy($request, $id);
        return $data;
    }

    public function editRole(RoleEditRequest $request, $id)
    {
        $data = $this->roleService->edit($request, $id);
        $data = json_decode($data->content(), 1);
        return $data;
    }
}
