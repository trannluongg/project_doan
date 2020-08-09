<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 11/3/2020
 * Time: 4:51 PM
 */

namespace Modules\Admin\Repository\Role;


use App\Core123\EloquentRepository;
use App\Models\Role;

class RoleRepository extends EloquentRepository implements RoleRepositoryInterface
{

    public function __construct(Role $model)
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
        $id                     = $filter['id'] ?? null;
        $name                   = $filter['name'] ?? null;
        $identifier_name        = $filter['identifier_name'] ?? null;

        $query                  = $this->model->whereRaw(1);

        $query = $this->scopeQuery($query, $filter, $fields);

        if ($id)                $query->where('id', $id);
        if ($name)              $query->where('name', $name);
        if ($identifier_name)   $query->where('identifier_name', $identifier_name);

        return  $query;
    }
}
