<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 11/3/2020
 * Time: 11:28 AM
 */

namespace Modules\Admin\Services;


use App\Service\BaseService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Admin\Http\Requests\Permission\PermissionCreateRequest;
use Modules\Admin\Http\Requests\Permission\PermissionEditRequest;
use Modules\Admin\Repository\Permission\PermissionRepositoryInterface;
use Modules\Admin\Transformers\Permission\PermissionTransformer;

class PermissionService extends BaseService
{
    private $permissionRepository;

    public function __construct(PermissionRepositoryInterface $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
    }

    public function create(PermissionCreateRequest $request)
    {
        $data                       = [];
        $data['name']               = $request->name;
        $data['identifier_name']    = $request->identifier_name;
        $data['guard_name']         = config('admin.guard_name');
        $data['description']        = $request->description;
        $data['module_id']          = ($request->module_id == "") ? null : $request->module_id;

        $permission = $this->permissionRepository->create($data);

        return $this->responseCreatedSuccess($permission, PermissionTransformer::class);
    }

    public function getList(Request $request)
    {
        $filter  = [
            'id'            => $request->get('id'),
            'name'          => $request->get('name'),
            'guard_name'    => $request->get('guard_name'),
            'order'         => $request->get('order'),
            'limit'         => $request->get('limit'),
            'date_range'    => $request->get('date_range'),
            'include'       => $request->get('include'),
        ];
        $fields    = $request->get('fields') ?? 'name,identifier_name,description,module_id,created_at';
        $paginate   = $request->get('paginate') ?? 20;

        $permission = $this->permissionRepository->getList($filter, $fields, $paginate);

        return $paginate ? $this->responseDataWithPaginator($permission, PermissionTransformer::class, $request->all())
                        : $this->responseDataCollection($permission, PermissionTransformer::class);
    }

    public function show($id)
    {
        $permission = $this->permissionRepository->firstById($id);

        if (!$permission) return $this->responseErrorNotFound();

        $data = $this->fractalTransformerData($permission, PermissionTransformer::class);

        return $this->responseSuccess(['data' => $data]);
    }

    public function edit(PermissionEditRequest $request, $id)
    {
        $data                       = [];
        $data['name']               = $request->name;
        $data['identifier_name']    = $request->identifier_name;
        $data['description']        = $request->description;
        $data['module_id']          = ($request->module_id == "") ? null : $request->module_id;

        $permission = $this->permissionRepository->firstById($id);

        if (!$permission) return $this->responseErrorNotFound();

        $this->permissionRepository->updateById($id, $data);

        return $this->responseSuccess([], trans('messages.update_success'), Response::HTTP_OK);
    }
}
