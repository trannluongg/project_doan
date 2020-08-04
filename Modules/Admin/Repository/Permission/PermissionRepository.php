<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 11/3/2020
 * Time: 11:08 AM
 */

namespace Modules\Admin\Repository\Permission;

use App\Core123\EloquentRepository;
use App\Models\Permission;

class PermissionRepository extends EloquentRepository implements PermissionRepositoryInterface
{
    public function __construct(Permission $model)
    {
        $this->model = $model;
    }

    public function getList($filter = [], $fields = null, $paginate = null)
    {
        $limit   = $filter['limit'] ?? 20;

        $query = $this->createQuery($filter, $fields);

        return  $paginate ? $query->paginate($paginate) : $query->limit($limit)->get();
    }

    public function findOneBy($filter = [], $fields = null)
    {
        $query = $this->createQuery($filter, $fields);

        return $query->first();
    }

    public function createQuery($filter = [], $fields = null)
    {
        $id             = $filter['id'] ?? null;
        $name           = $filter['name'] ?? null;
        $guard_name     = $filter['guard_name'] ?? null;
        $module_id      = $filter['module_id'] ?? null;

        $query          = $this->model->whereRaw(1);

        $query = $this->scopeQuery($query, $filter, $fields);

        if ($id)            $query->where('id', $id);
        if ($name)          $query->where('name', $name);
        if ($guard_name)    $query->where('guard_name', $guard_name);
        if ($module_id || $module_id === 0)    $query->where('module_id', $module_id);

        return  $query;
    }
}
