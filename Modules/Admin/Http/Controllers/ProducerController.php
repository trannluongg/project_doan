<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 22/06/2020
 * Time: 23:26
 */

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Admin\Http\Requests\Producer\ProducerCreatedRequest;
use Modules\Admin\Http\Requests\Producer\ProducerEditRequest;
use Modules\Admin\Services\AdminAuthService;
use Modules\Admin\Services\ModuleGroupService;
use Modules\Admin\Services\ProducerService;

class ProducerController extends Controller
{
    private $producerService;
    private $moduleGroupService;
    private $adminAuthService;

    public function __construct(ProducerService $producerService,
                                ModuleGroupService $moduleGroupService,
                                AdminAuthService $adminAuthService)
    {
        $this->producerService = $producerService;
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

        $data = $this->producerService->getList($request);
        $data = json_decode($data->content(), 1);
        $data_producer = $data['data'];
        $paginate = $data['meta']['pagination'];

        return view('admin::pages.producer.index', compact(
            'data_producer',
            'modules_group_menu',
            'admin_permission',
            'paginate'));
    }

    public function store(ProducerCreatedRequest $request)
    {
        $data = $this->producerService->create($request);
        return $data;
    }

    public function getProducer($id)
    {
        $data = $this->producerService->show($id);
        $data = json_decode($data->content(), 1);
        return $data;
    }

    public function editProducer(ProducerEditRequest $request, $id)
    {
        $data = $this->producerService->edit($request, $id);
        $data = json_decode($data->content(), 1);
        return $data;
    }
}
