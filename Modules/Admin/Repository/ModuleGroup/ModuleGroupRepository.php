<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 1/4/2020
 * Time: 3:12 PM
 */

namespace Modules\Admin\Repository\ModuleGroup;

use App\Core123\EloquentRepository;
use App\Models\ModuleGroup;

class ModuleGroupRepository extends EloquentRepository implements ModuleGroupRepositoryInterface
{
    public function __construct(ModuleGroup $moduleGroup)
    {
        $this->model = $moduleGroup;
    }

    public function getList($filter = [], $fields = null, $paginate = null)
    {
        $limit   = $filter['limit'] ?? 20;

        $query = $this->createQuery($filter, $fields);

        return  $paginate ? $query->paginate($paginate) : $query->limit($limit)->get();
    }

    public function findOneBy($filter = [], $fields = null)
    {
        $query = $this->createQuery($filter, $fields);

        return $query->first();
    }

    public function createQuery($filter = [], $fields = null)
    {
        $id             = $filter['id'] ?? null;
        $mog_name       = $filter['mog_name'] ?? null;
        $mog_order      = $filter['mog_order'] ?? null;

        $query          = $this->model->whereRaw(1);

        $query = $this->scopeQuery($query, $filter, $fields);

        if ($id)                $query->where('id', $id);
        if ($mog_name)          $query->where('mog_name', $mog_name);
        if ($mog_order)         $query->where('mog_order', $mog_order);

        return $query;
    }
}
