<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 22/06/2020
 * Time: 22:44
 */

namespace Modules\Admin\Repository\Brand;


use App\Core123\EloquentRepository;
use App\Models\Brands;

class BrandRepository extends EloquentRepository implements BrandRepositoryInterface
{
    public function __construct(Brands $brands)
    {
        $this->model = $brands;
    }

    public function getList($filter = [], $columns = null, $paginate = null)
    {
        $limit          = $filter['limit'] ?? 20;

        $query = $this->createQuery($filter, $columns);

        return $paginate ? $query->paginate($paginate) : ($limit ? $query->limit($limit)->get() : $query->get());
    }

    public function createQuery($filter = [], $fields = null)
    {
        $id             = $filter['id'] ?? null;
        $bra_name       = $filter['bra_name'] ?? null;

        $query          = $this->model->whereRaw(1);

        $query = $this->scopeQuery($query, $filter, $fields);

        if ($id)                $query->where('id', $id);
        if ($bra_name)          $query->where('bra_name', $bra_name);

        return $query;
    }
}
