<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 23/07/2020
 * Time: 23:56
 */

namespace App\Repository\Brand;


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

        return $query->limit($limit)->get();
    }


    public function createQuery($filter = [], $fields = null)
    {
        $flag_field      = $filter['flag_field'] ?? null;

        $query          = $this->model->whereRaw(1);

        $query = $this->scopeQuery($query, $filter, $fields, '', $flag_field);

        return $query;
    }

    public function getBrandWithSlug($slug = null)
    {
        return $this->model->where('bra_slug', $slug)->limit(1)->get(['id', 'bra_name']);
    }
}
