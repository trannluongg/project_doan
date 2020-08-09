<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 21/3/2020
 * Time: 4:11 PM
 */

namespace Modules\Admin\Services;


use App\Service\BaseService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Admin\Http\Requests\Module\ModuleCreateRequest;
use Modules\Admin\Http\Requests\Module\ModuleEditRequest;
use Modules\Admin\Repository\Module\ModuleRepositoryInterface;
use Modules\Admin\Repository\Permission\PermissionRepositoryInterface;
use Modules\Admin\Transformers\Module\ModuleTransformer;

class ModuleService extends BaseService
{
    private $moduleRepository;
    private $permissionRepository;

    public function __construct(ModuleRepositoryInterface $moduleRepository, PermissionRepositoryInterface $permissionRepository)
    {
        $this->moduleRepository = $moduleRepository;
        $this->permissionRepository = $permissionRepository;
    }

    public function create(ModuleCreateRequest $request)
    {
        $data                           = [];
        $data['mod_name']               = $request->name;
        $data['mod_icon']               = $request->icon;
        $data['mod_order']              = $request->order;
        $data['mod_menu']               = json_encode($request->menu);
        $data['mod_menu_route']         = json_encode($request->menu_route);
        $data['mod_menu_permission']    = json_encode($request->menu_permission);
        $data['mod_module_group_id']    = $request->module_group;
        $permission_id                  = $request->permission;

        $permission_p = $this->permissionRepository->firstById($permission_id);

        $data['mod_permission'] = $permission_p['name'] ?? '';

        $module = $this->moduleRepository->create($data);

        return $this->responseCreatedSuccess($module, ModuleTransformer::class);
    }

    public function getList(Request $request)
    {
        $include = ["module_permissions"=>["fields"=>["id","name","description","module_id"]],"modules"=>["fields"=>["id","name"]]];
        $filter  = [
            'id'            => $request->get('id'),
            'mod_name'      => $request->get('mod_name'),
            'mod_order'     => $request->get('mod_order'),
            'date_range'    => $request->get('date_range'),
            'order'         => $request->get('order'),
            'limit'         => $request->get('limit'),
            'include'       => $request->get('include') ?? json_encode($include)
        ];
        $fields = $request->get('fields') ?? 'name,icon,permission,order,module_group_id,created_at';
        $paginate       = $request->get('paginate') ?? 20;

        $module = $this->moduleRepository->getList($filter,$fields , $paginate);

        return $paginate ? $this->responseDataWithPaginator($module, ModuleTransformer::class, $request->all())
                        : $this->responseDataCollection($module, ModuleTransformer::class);
    }

    public function show($id)
    {
        $module = $this->moduleRepository->firstById($id);

        if (!$module) return $this->responseErrorNotFound();

        $data = $this->fractalTransformerData($module, ModuleTransformer::class);

        return $this->responseSuccess(['data' => $data]);
    }


    public function edit(ModuleEditRequest $request, $id)
    {
        $data                           = [];
        $data['mod_name']               = $request->name;
        $data['mod_icon']               = $request->icon;
        $data['mod_order']              = $request->order;
        $data['mod_menu']               = json_encode($request->menu);
        $data['mod_menu_route']         = json_encode($request->menu_route);
        $data['mod_menu_permission']    = json_encode($request->menu_permission);
        $data['mod_module_group_id']    = $request->module_group;
        $permission_id                  = $request->permission;

        $permission_p = $this->permissionRepository->firstById($permission_id);

        $data['mod_permission'] = $permission_p['name'] ?? '';

        $module = $this->moduleRepository->firstById($id);

        if (!$module) return $this->responseErrorNotFound();

        $this->moduleRepository->updateById($id, $data);

        return $this->responseSuccess([], trans('messages.update_success'), Response::HTTP_OK);
    }
}
