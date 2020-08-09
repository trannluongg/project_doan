<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 21/3/2020
 * Time: 3:59 PM
 */

namespace Modules\Admin\Repository\Module;

use App\Core123\EloquentRepository;
use App\Models\Module;

class ModuleRepository extends EloquentRepository implements ModuleRepositoryInterface
{

    public function __construct(Module $module)
    {
        $this->model = $module;
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
        $mod_name       = $filter['mod_name'] ?? null;
        $mod_order      = $filter['mod_order'] ?? null;

        $query          = $this->model->whereRaw(1);

        $query = $this->scopeQuery($query, $filter, $fields);

        if ($id)                $query->where('id', $id);
        if ($mod_name)          $query->where('mod_name', $mod_name);
        if ($mod_order)         $query->where('mod_order', $mod_order);

        return $query;
    }
}
