<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 15/06/2020
 * Time: 21:25
 */

namespace Modules\Admin\Repository\Admin;


use App\Models\Admins;
use App\Core123\EloquentRepository;

class AdminRepository extends EloquentRepository implements AdminRepositoryInterface
{
    public function __construct(Admins $model)
    {
        $this->model = $model;
    }

    public function getList($filter = [], $columns = null, $paginate = null)
    {
        $limit          = $filter['limit'] ?? 20;

        $query = $this->createQuery($filter, $columns);

        return  $paginate ? $query->paginate($paginate) : $query->limit($limit)->get();
    }

    public function createQuery($filter = [], $fields = null)
    {
        $id             = $filter['id'] ?? null;
        $name           = $filter['name'] ?? null;
        $email          = $filter['email'] ?? null;
        $status         = $filter['status'] ?? null;
        $role           = $filter['role'] ?? null;

        $query          = $this->model->whereRaw(1);

        if ($role)
        {
            $query->join('model_has_roles', 'admins.id', '=', 'model_has_roles.model_id')
                ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')->where('roles.id','=', $role);
        }

        $query = $this->scopeQuery($query, $filter, $fields, 'admins');

        if ($id)                $query->where('admins.id', $id);
        if ($name)              $query->where('admins.name', $name);
        if ($email)             $query->where('admins.email', $email);
        if ($status)            $query->where('admins.status', $status);

        return  $query;
    }

    public function findOneBy($filter = [], $fields = null)
    {
        $query = $this->createQuery($filter, $fields);

        return $query->first();
    }
}
