<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 22/06/2020
 * Time: 22:43
 */

namespace Modules\Admin\Repository\Producer;


use App\Core123\EloquentRepository;
use App\Models\Producers;

class ProducerRepository extends EloquentRepository implements ProducerRepositoryInterface
{
    public function __construct(Producers $producers)
    {
        $this->model = $producers;
    }

    public function getList($filter = [], $columns = null, $paginate = null)
    {
        $limit          = $filter['limit'];

        $query = $this->createQuery($filter, $columns);

        return $paginate ? $query->paginate($paginate) : ($limit ? $query->limit($limit)->get() : $query->get());
    }

    public function createQuery($filter = [], $fields = null)
    {
        $id             = $filter['id'] ?? null;
        $pro_name       = $filter['pro_name'] ?? null;

        $query          = $this->model->whereRaw(1);

        $query = $this->scopeQuery($query, $filter, $fields);

        if ($id)                $query->where('id', $id);
        if ($pro_name)          $query->where('pro_name', $pro_name);

        return $query;
    }
}
