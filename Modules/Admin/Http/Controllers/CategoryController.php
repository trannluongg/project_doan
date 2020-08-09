<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 22/06/2020
 * Time: 23:26
 */

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Admin\Http\Requests\Category\CategoryCreateRequest;
use Modules\Admin\Http\Requests\Category\CategoryEditRequest;
use Modules\Admin\Services\AdminAuthService;
use Modules\Admin\Services\CategoryService;
use Modules\Admin\Services\ModuleGroupService;

class CategoryController extends Controller
{
    private $categoryService;
    private $moduleGroupService;
    private $adminAuthService;

    public function __construct(CategoryService $categoryService,
                                ModuleGroupService $moduleGroupService,
                                AdminAuthService $adminAuthService)
    {
        $this->categoryService = $categoryService;
        $this->adminAuthService = $adminAuthService;
        $this->moduleGroupService = $moduleGroupService;
        parent::__construct();
    }

    public function index(Request $request)
    {
        $data_module_group = $this->moduleGroupService->getList($request);
        $data_module_group = json_decode($data_module_group->content(), 1);

        $modules_group_menu = $this->getAllModule($data_module_group);

        $admin = $this->adminAuthService->getAdmin();
        $admin_permission = $this->getAdminPermissions($admin);

        $data = $this->categoryService->getList($request);
        $data = json_decode($data->content(), 1);
        $data_category = $data['data'];
        $paginate = $data['meta']['pagination'];

        return view('admin::pages.category.index', compact(
            'data_category',
            'admin_permission',
            'modules_group_menu',
            'paginate'));
    }

    public function store(CategoryCreateRequest $request)
    {
        $data = $this->categoryService->create($request);
        return $data;
    }


    public function getCategory($id)
    {
        $data = $this->categoryService->show($id);
        $data = json_decode($data->content(), 1);
        return $data;
    }

    public function editCategory(CategoryEditRequest $request, $id)
    {
        $data = $this->categoryService->edit($request, $id);
        $data = json_decode($data->content(), 1);
        return $data;
    }
}
