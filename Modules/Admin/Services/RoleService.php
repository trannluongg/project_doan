<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 11/3/2020
 * Time: 5:15 PM
 */

namespace Modules\Admin\Services;


use App\Service\BaseService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Admin\Http\Requests\Role\RoleCreateRequest;
use Modules\Admin\Http\Requests\Role\RoleEditRequest;
use Modules\Admin\Repository\Permission\PermissionRepositoryInterface;
use Modules\Admin\Repository\Role\RoleRepositoryInterface;
use Modules\Admin\Transformers\Role\RoleTransformer;

class RoleService extends BaseService
{
    private $roleRepository;
    private $permissionRepository;

    public function __construct(RoleRepositoryInterface $roleRepository,
                                PermissionRepositoryInterface $permissionRepository
    )
    {
        $this->roleRepository = $roleRepository;
        $this->permissionRepository = $permissionRepository;
    }

    public function create(RoleCreateRequest $request)
    {
        $data                       = [];
        $data['name']               = $request->name;
        $data['identifier_name']    = $request->identifier_name;
        $data['guard_name']         = config('admin.guard_name');
        $data['description']        = $request->description;
        $permissions                = $request->permissions;

        $role                       = $this->roleRepository->create($data);

        $role->givePermissionTo($permissions);

        return $this->responseCreatedSuccess($role, RoleTransformer::class);
    }

    public function getList(Request $request)
    {
        $include = ["permissions" => ['fields' => ['id', 'name']]];

        $filter  = [
            'id'            => $request->get('id'),
            'name'          => $request->get('name'),
            'guard_name'    => $request->get('guard_name'),
            'date_range'    => $request->get('date_range'),
            'order'         => $request->get('order'),
            'limit'         => $request->get('limit'),
            'include'       => $request->get('include') ?? json_encode($include)
        ];
        $fields    = $request->get('fields') ?? 'name,identifier_name,description,created_at';
        $paginate   = $request->get('paginate') ?? 20;

        $role       = $this->roleRepository->getList($filter, $fields, $paginate);

        return $paginate ? $this->responseDataWithPaginator($role, RoleTransformer::class, $request->all())
                            : $this->responseDataCollection($role, RoleTransformer::class);
    }

    public function show($id)
    {
        $role = $this->roleRepository->firstById($id);

        if (!$role) return $this->responseErrorNotFound();

        $data = $this->fractalTransformerData($role, RoleTransformer::class);

        return $this->responseSuccess(['data' => $data]);
    }

    public function edit(RoleEditRequest $request, $id)
    {
        $data                       = [];
        $data['name']               = $request->name;
        $data['identifier_name']    = $request->identifier_name;
        $data['description']        = $request->description;
        $permissions                = $request->permissions;

        $role                       = $this->roleRepository->firstById($id);

        if(!$role) return $this->responseErrorNotFound();

        $this->roleRepository->updateById($id, $data);

        $permission_all = $role->permissions;

        $role->revokePermissionTo($permission_all);

        $role->givePermissionTo($permissions);

        return $this->responseSuccess([$permission_all], trans('messages.update_success'), Response::HTTP_OK);
    }

    public function findOneBy(Request $request, $id)
    {
        $include = ["permissions" => ['fields' => ['id', 'name', 'module_id'],]];

        $filter   = [
            'id'            => $id,
            'include'       => $request->get('include') ?? json_encode($include)
        ];

        $fields  = $request->get('fields') ?? 'name,identifier_name,description';

        $user = $this->roleRepository->findOneBy($filter, $fields);

        if(!$user) return $this->responseErrorNotFound();

        return $this->responseItemData($user, RoleTransformer::class);
    }
}
