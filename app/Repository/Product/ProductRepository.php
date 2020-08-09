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
        $pro_brand_id       = $filter['brand_id'] ?? null;
        $pro_key_search     = $filter['key_search'] ?? null;
        $pro_producer       = $filter['pro_producer'] ?? null;
        $pro_price          = $filter['pro_price'] ?? null;

        $query          = $this->model->whereRaw(1);

        $query = $this->scopeQuery($query, $filter, $fields, '', $flag_field);
        if ($pro_brand)         $query->where('pro_brand', $pro_brand);
        if ($pro_not)           $query->where('id', '<>', $pro_not);
        if ($pro_brand_not)     $query->where('pro_brand', '<>', $pro_brand_not);
        if ($pro_brand_id)      $query->where('pro_brand', $pro_brand_id);
        if ($pro_key_search)    $query->where('pro_name', 'like', '%' . $pro_key_search . '%');
        if ($pro_producer)      $query->where('pro_producer', $pro_producer);
        switch ($pro_price)
        {
            case 1:
                $query->whereBetween('pro_price', [0, 1000000]);
                break;
            case 13:
                $query->whereBetween('pro_price', [1000000, 3000000]);
                break;
            case 36:
                $query->whereBetween('pro_price', [3000000, 6000000]);
                break;
            case 610:
                $query->whereBetween('pro_price', [6000000, 10000000]);
                break;
            case 1015:
                $query->whereBetween('pro_price', [10000000, 15000000]);
                break;
            case 15:
                $query->where('pro_price', '>', 15000000);
                break;
        }

        return $query;
    }
}
