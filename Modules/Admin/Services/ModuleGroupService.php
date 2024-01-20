<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 1/4/2020
 * Time: 3:05 PM
 */

namespace Modules\Admin\Services;


use App\Services\BaseService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Admin\Http\Requests\ModuleGroup\ModuleGroupCreateRequest;
use Modules\Admin\Http\Requests\ModuleGroup\ModuleGroupEditRequest;
use Modules\Admin\Repository\ModuleGroup\ModuleGroupRepositoryInterface;
use Modules\Admin\Transformers\ModuleGroup\ModuleGroupTransformer;

class ModuleGroupService extends BaseService
{
    private $groupRepository;

    public function __construct(ModuleGroupRepositoryInterface $groupRepository)
    {
        $this->groupRepository = $groupRepository;
    }

    public function create(ModuleGroupCreateRequest $request)
    {

        $data                           = [];
        $data['mog_name']               = $request->name;
        $data['mog_order']              = $request->order;


        $module_group = $this->groupRepository->create($data);

        return $this->responseCreatedSuccess($module_group, ModuleGroupTransformer::class);
    }

    public function getList(Request $request)
    {
        $include = [
            "modules_group" => [
                'fields' => [
                    'id',
                    'name',
                    'icon',
                    'permission',
                    'menu',
                    'menu_route',
                    'menu_permission',
                    'module_group_id'
                ],
                'order' => [
                    [
                        'order',
                        'asc'
                    ],
                ],
            ]
        ];

        $filter  = [
            'id'            => $request->get('id'),
            'mog_name'      => $request->get('mog_name'),
            'mog_order'     => $request->get('mog_order'),
            'date_range'    => $request->get('date_range'),
            'order'         => $request->get('order') ?? [['order', 'desc']],
            'limit'         => $request->get('limit'),
            'include'       => $request->get('include') ?? json_encode($include)
        ];

        $fields = $request->get('fields') ?? 'name,order,created_at';

        if ($fields)    $fields = explode(',',$fields );

        $paginate       = $request->get('paginate') ?? 20;

        $module_group = $this->groupRepository->getList($filter,$fields , $paginate);

        return $paginate ? $this->responseDataWithPaginator($module_group, ModuleGroupTransformer::class, $request->all())
            : $this->responseDataCollection($module_group, ModuleGroupTransformer::class);
    }

    public function show($id)
    {
        $module = $this->groupRepository->firstById($id);

        if (!$module) return $this->responseErrorNotFound();

        $data = $this->fractalTransformerData($module, ModuleGroupTransformer::class);

        return $this->responseSuccess(['data' => $data]);
    }

    public function edit(ModuleGroupEditRequest $request, $id)
    {
        $data                           = [];
        $data['mog_name']               = $request->name;
        $data['mog_order']              = $request->order;

        $module = $this->groupRepository->firstById($id);

        if (!$module) return $this->responseErrorNotFound();

        $this->groupRepository->updateById($id, $data);

        return $this->responseSuccess([], trans('messages.update_success'), Response::HTTP_OK);
    }

    public function getMenuAdmin()
    {
        $include = [
            "modules_group" => [
                'fields' => [
                    'id',
                    'name',
                    'icon',
                    'permission',
                    'menu',
                    'menu_route',
                    'menu_permission',
                    'module_group_id'
                ],
                'order' => [
                    [
                        'order',
                        'asc'
                    ],
                ],
            ]
        ];

        $filter  = [
            'include'       => json_encode($include)
        ];

        $fields = 'name,order';

        $paginate       = 20;

        $module_group = $this->groupRepository->getList($filter,$fields , $paginate);

        return $this->responseDataCollection($module_group, ModuleGroupTransformer::class);
    }
}
