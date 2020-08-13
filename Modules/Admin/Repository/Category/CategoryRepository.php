<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 22/06/2020
 * Time: 22:44
 */

namespace Modules\Admin\Repository\Category;


use App\Core123\EloquentRepository;
use App\Models\Category;

class CategoryRepository extends EloquentRepository implements CategoryRepositoryInterface
{
    public function __construct(Category $category)
    {
        $this->model = $category;
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
        $cat_name       = $filter['cat_name'] ?? null;

        $query          = $this->model->whereRaw(1);

        $query = $this->scopeQuery($query, $filter, $fields);

        if ($id)                $query->where('id', $id);
        if ($cat_name)          $query->where('cat_name', $cat_name);

        return $query;
    }
}
