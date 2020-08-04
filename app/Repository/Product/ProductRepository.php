<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 15/07/2020
 * Time: 22:23
 */

namespace App\Repository\Product;


use App\Core123\EloquentRepository;
use App\Models\Products;

class ProductRepository extends EloquentRepository implements ProductRepositoryInterface
{
    public function __construct(Products $products)
    {
        $this->model = $products;
    }

    public function getList($filter = [], $columns = null, $paginate = null)
    {
        $limit          = $filter['limit'] ?? 20;

        $query = $this->createQuery($filter, $columns);

        return $query->limit($limit)->get();
    }


    public function createQuery($filter = [], $fields = null)
    {
        $pro_brand          = $filter['pro_brand'] ?? null;
        $flag_field         = $filter['flag_field'] ?? null;
        $pro_not            = $filter['pro_not'] ?? null;
        $pro_brand_not      = $filter['pro_brand_not'] ?? null;

        $query          = $this->model->whereRaw(1);

        $query = $this->scopeQuery($query, $filter, $fields, '', $flag_field);

        if ($pro_brand)         $query->where('pro_brand', $pro_brand);
        if ($pro_not)           $query->where('id', '<>', $pro_not);
        if ($pro_brand_not)     $query->where('pro_brand', '<>', $pro_brand_not);

        return $query;
    }
}
