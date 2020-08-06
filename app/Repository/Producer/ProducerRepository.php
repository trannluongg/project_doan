<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 05/08/2020
 * Time: 22:27
 */

namespace App\Repository\Producer;


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
        $limit          = $filter['limit'] ?? 20;

        $query = $this->createQuery($filter, $columns);

        return $query->limit($limit)->get();
    }


    public function createQuery($filter = [], $fields = null)
    {
        $flag_field         = $filter['flag_field'] ?? null;

        $query          = $this->model->whereRaw(1);

        $query = $this->scopeQuery($query, $filter, $fields, '', $flag_field);

        return $query;
    }
}
