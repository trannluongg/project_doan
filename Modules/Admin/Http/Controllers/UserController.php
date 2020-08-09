<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 22/06/2020
 * Time: 23:25
 */

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Admin\Http\Requests\User\UserCreateRequest;
use Modules\Admin\Http\Requests\User\UserEditRequest;
use Modules\Admin\Services\AdminAuthService;
use Modules\Admin\Services\ModuleGroupService;
use Modules\Admin\Services\UserService;

class UserController extends Controller
{
    private $userService;
    private $moduleGroupService;
    private $adminAuthService;

    public function __construct(UserService $userService,
                                ModuleGroupService $moduleGroupService,
                                AdminAuthService $adminAuthService)
    {
        $this->userService = $userService;
        $this->moduleGroupService = $moduleGroupService;
        $this->adminAuthService = $adminAuthService;
        parent::__construct();
    }

    public function index(Request $request)
    {
        $data_module_group = $this->moduleGroupService->getList($request);
        $data_module_group = json_decode($data_module_group->content(), 1);

        $modules_group_menu = $this->getAllModule($data_module_group);

        $admin = $this->adminAuthService->getAdmin();
        $admin_permission = $this->getAdminPermissions($admin);

        $data = $this->userService->getList($request);
        $data = json_decode($data->content(), 1);
        $data_users = $data['data'];
        $paginate = $data['meta']['pagination'];

        return view('admin::pages.user.index', compact(
            'data_users',
            'modules_group_menu',
            'admin_permission',
            'paginate'));
    }

    public function store(UserCreateRequest $request)
    {
        return $this->userService->create($request);
    }

    public function getAccUser($id)
    {
        $data = $this->userService->show($id);
        $data = json_decode($data->content(), 1);
        return $data;
    }

    public function editAccUser(UserEditRequest $request, $id)
    {
        $data = $this->userService->edit($request, $id);
        $data = json_decode($data->content(), 1);
        return $data;
    }

    public function getAvatarUser($id)
    {
        $data = $this->userService->show($id);
        $data = json_decode($data->content(), 1);
        return $data;
    }

    public function updateAvatarUser(Request $request, $id)
    {
        $data = $this->userService->updateAvatar($request, $id);
        $data = json_decode($data->content(), 1);
        return $data;
    }

}
