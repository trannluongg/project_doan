<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 22/06/2020
 * Time: 23:26
 */

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Admin\Http\Requests\Brand\BrandCreateRequest;
use Modules\Admin\Http\Requests\Brand\BrandEditRequest;
use Modules\Admin\Services\AdminAuthService;
use Modules\Admin\Services\BrandService;
use Modules\Admin\Services\ModuleGroupService;

class BrandController extends Controller
{
    private $brandService;
    private $moduleGroupService;
    private $adminAuthService;

    public function __construct(BrandService $brandService,
                                ModuleGroupService $moduleGroupService,
                                AdminAuthService $adminAuthService)
    {
        $this->brandService = $brandService;
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

        $data = $this->brandService->getList($request);
        $data = json_decode($data->content(), 1);
        $data_brand = $data['data'];
        $paginate = $data['meta']['pagination'];

        return view('admin::pages.brand.index', compact(
            'data_brand',
            'modules_group_menu',
            'admin_permission',
            'paginate'));
    }

    public function store(BrandCreateRequest $request)
    {
        $data = $this->brandService->create($request);
        return $data;
    }


    public function getBrand($id)
    {
        $data = $this->brandService->show($id);
        $data = json_decode($data->content(), 1);
        return $data;
    }

    public function editBrand(BrandEditRequest $request, $id)
    {
        $data = $this->brandService->edit($request, $id);
        $data = json_decode($data->content(), 1);
        return $data;
    }
}
