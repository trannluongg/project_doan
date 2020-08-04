<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 20/06/2020
 * Time: 17:28
 */

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Admin\Http\Requests\ModuleGroup\ModuleGroupCreateRequest;
use Modules\Admin\Http\Requests\ModuleGroup\ModuleGroupEditRequest;
use Modules\Admin\Services\AdminAuthService;
use Modules\Admin\Services\ModuleGroupService;

class ModuleGroupController extends Controller
{
    private $moduleGroupService, $adminAuthService;

    public function __construct(ModuleGroupService $moduleGroupService, AdminAuthService $adminAuthService)
    {
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

        $data_module    = $data['data'];
        $paginate       = $data['meta']['pagination'];

        return view('admin::pages.module_group.index', compact(
            'data_module',
            'modules_group_menu',
            'admin_permission',
            'paginate'));
    }

    public function getModuleGroup($id)
    {
        $data = $this->moduleGroupService->show($id);
        $data = json_decode($data->content(), 1);
        return $data;
    }

    public function editModuleGroup(ModuleGroupEditRequest $request, $id)
    {
        $data = $this->moduleGroupService->edit($request, $id);
        $data = json_decode($data->content(), 1);
        return $data;
    }

    public function store(ModuleGroupCreateRequest $request)
    {
        $data = $this->moduleGroupService->create($request);
        return $data;
    }
}
