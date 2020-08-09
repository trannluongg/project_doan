<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 22/06/2020
 * Time: 22:42
 */

namespace Modules\Admin\Repository\User;


use App\Core123\EloquentRepository;
use App\Models\User;

class UserRepository extends EloquentRepository implements UserRepositoryInterface
{
    public function __construct(User $user)
    {
        $this->model = $user;
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

        $query          = $this->model->whereRaw(1);

        $query = $this->scopeQuery($query, $filter, $fields);

        if ($id)                $query->where('id', $id);
        if ($name)              $query->where('name', $name);
        if ($email)             $query->where('email', $email);
        if ($status)            $query->where('status', $status);

        return  $query;
    }

    public function findOneBy($filter = [], $fields = null)
    {
        $query = $this->createQuery($filter, $fields);

        return $query->first();
    }
}
