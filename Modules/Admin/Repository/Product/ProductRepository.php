<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 22/06/2020
 * Time: 22:42
 */

namespace Modules\Admin\Repository\Product;


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

        return $paginate ? $query->paginate($paginate) : $query->limit($limit)->get();
    }


    public function createQuery($filter = [], $fields = null)
    {
        $id             = $filter['id'] ?? null;
        $pro_name       = $filter['pro_name'] ?? null;
        $pro_price      = $filter['pro_price'] ?? null;
        $pro_brand      = $filter['pro_brand'] ?? null;
        $pro_producer   = $filter['pro_producer'] ?? null;
        $pro_category   = $filter['pro_category'] ?? null;

        $query          = $this->model->whereRaw(1);

        if ($pro_producer)
        {
            $query->join('producers', 'producers.id', '=', 'products.pro_producer')
                    ->where('producers.id','=', $pro_producer);
        }

        if ($pro_brand)
        {
            $query->join('brands', 'brands.id', '=', 'products.pro_brand')
                ->where('brands.id','=', $pro_brand);
        }

        if ($pro_category)
        {
            $query->join('category', 'category.id', '=', 'products.pro_category')
                ->where('category.id','=', $pro_category);
        }

        $query = $this->scopeQuery($query, $filter, $fields, 'products');

        if ($id)                $query->where('products.id', $id);
        if ($pro_name)          $query->where('products.pro_name', $pro_name);
        if ($pro_price)         $query->where('pro_price', 'like', $pro_price . '%');

        return $query;
    }
}
