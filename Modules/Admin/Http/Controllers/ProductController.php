<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 22/06/2020
 * Time: 23:25
 */

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Admin\Http\Requests\Product\ProductCreateRequest;
use Modules\Admin\Http\Requests\Product\ProductEditRequest;
use Modules\Admin\Services\AdminAuthService;
use Modules\Admin\Services\BrandService;
use Modules\Admin\Services\CategoryService;
use Modules\Admin\Services\ModuleGroupService;
use Modules\Admin\Services\ProducerService;
use Modules\Admin\Services\ProductService;

class ProductController extends Controller
{
    private $productService;
    private $categoryService;
    private $brandService;
    private $producerService;
    private $moduleGroupService;
    private $adminAuthService;

    public function __construct(ProductService $productService,
                                CategoryService $categoryService,
                                BrandService $brandService,
                                ProducerService $producerService,
                                ModuleGroupService $moduleGroupService,
                                AdminAuthService $adminAuthService)
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
        $this->brandService = $brandService;
        $this->producerService = $producerService;
        $this->moduleGroupService = $moduleGroupService;
        $this->adminAuthService = $adminAuthService;
        parent::__construct();
    }

    public function index(Request $request)
    {
        $data = $this->productService->getList($request);
        $data = json_decode($data->content(), 1);
        $data_product = $data['data'];
        $paginate = $data['meta']['pagination'];
        unset($request['page']);

        $data = $this->moduleGroupService->getList($request);
        $data = json_decode($data->content(), 1);

        $modules_group_menu = $this->getAllModule($data);

        $admin = $this->adminAuthService->getAdmin();
        $admin_permission = $this->getAdminPermissions($admin);

        $data_category = $this->categoryService->getList($request);
        $data_category = json_decode($data_category->content(), 1);
        $data_category = $data_category['data'];

        $data_brand = $this->brandService->getList($request, false);
        $data_brand = json_decode($data_brand->content(), 1);
        $data_brand = $data_brand['data'];

        $data_producer = $this->producerService->getList($request, false);
        $data_producer = json_decode($data_producer->content(), 1);
        $data_producer = $data_producer['data'];

        return view('admin::pages.product.index', compact('data_product',
            'data_producer',
            'modules_group_menu',
            'admin_permission',
            'data_category',
            'data_brand',
            'paginate'));
    }


    public function store(ProductCreateRequest $request)
    {
        $data = $this->productService->create($request);
        return $data;
    }

    public function getProduct($id)
    {
        $data = $this->productService->show($id);
        $data = json_decode($data->content(), 1);
        return $data;
    }

    public function editProduct(ProductEditRequest $request, $id)
    {
        $data = $this->productService->edit($request, $id);
        $data = json_decode($data->content(), 1);
        return $data;
    }
}
