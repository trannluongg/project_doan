<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Admin\Http\Requests\AdminEditInfoRequest;
use Modules\Admin\Http\Requests\AdminRegisterRequest;
use Modules\Admin\Http\Requests\AdminUpdateAvatar;
use Modules\Admin\Services\AdminAuthService;
use Modules\Admin\Services\ModuleGroupService;
use Modules\Admin\Services\RoleService;

class AdminController extends Controller
{
    private $authService;
    private $moduleGroupService;
    private $adminAuthService;
    private $roleService;

    public function __construct(AdminAuthService $authService,
                                ModuleGroupService $moduleGroupService,
                                AdminAuthService $adminAuthService,
                                RoleService $roleService)
    {
        $this->authService = $authService;
        $this->adminAuthService = $adminAuthService;
        $this->moduleGroupService = $moduleGroupService;
        $this->roleService = $roleService;
        parent::__construct();
    }

    public function index(Request $request)
    {
        $data_module_group = $this->moduleGroupService->getList($request);
        $data_module_group = json_decode($data_module_group->content(), 1);

        $modules_group_menu = $this->getAllModule($data_module_group);

        $admin = $this->adminAuthService->getAdmin();
        $admin_permission = $this->getAdminPermissions($admin);

        $data_roles = $this->roleService->getList($request);
        $data_roles = json_decode($data_roles->content(), 1);
        $data_roles = $data_roles['data'];

        $data = $this->adminAuthService->getList($request);
        $data = json_decode($data->content(), 1);
        $data_acc_admin = $data['data'];
        $paginate = $data['meta']['pagination'];

        return view('admin::pages.acc_admin.index', compact(
            'data_acc_admin',
            'modules_group_menu',
            'data_roles',
            'admin_permission',
            'paginate'));
    }

    public function store(AdminRegisterRequest $request)
    {
        return $this->authService->createAdmin($request);
    }


    public function getAccAdmin(Request $request, $id)
    {
        $data = $this->authService->findOneBy($request, $id);
        $data = json_decode($data->content(), 1);
        return $data;
    }

    public function editAccAdmin(AdminEditInfoRequest $request, $id)
    {
        $data = $this->authService->editInfo($request, $id);
        $data = json_decode($data->content(), 1);
        return $data;
    }

    public function getAvatarAdmin($id)
    {
        $data = $this->authService->find($id);
        $data = json_decode($data->content(), 1);
        return $data;
    }

    public function updateAvatarAdmin(Request $request, $id)
    {
        $data = $this->authService->updateAvatar($request, $id);
        $data = json_decode($data->content(), 1);
        return $data;
    }

}
