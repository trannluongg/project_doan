<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 22/06/2020
 * Time: 22:45
 */

namespace Modules\Admin\Repository\Bill;


use App\Core123\EloquentRepository;
use App\Models\Bills;

class BillRepository extends EloquentRepository implements BillRepositoryInterface
{
    public function __construct(Bills $bills)
    {
        $this->model = $bills;
    }

    public function getList($filter = [], $columns = null, $paginate = null)
    {
        $limit          = $filter['limit'];

        $query = $this->createQuery($filter, $columns);

        return $paginate ? $query->paginate($paginate) : ($limit ? $query->limit($limit)->get() : $query->get());
    }

    public function createQuery($filter = [], $fields = null)
    {
        $id                     = $filter['id'] ?? null;
        $bil_user_id            = $filter['user_id'] ?? null;
        $bil_user_phone         = $filter['user_phone'] ?? null;

        $query          = $this->model->whereRaw(1);

        $query = $this->scopeQuery($query, $filter, $fields);

        if ($id)                $query->where('id', $id);
        if ($bil_user_id)       $query->where('bil_user', $bil_user_id);
        if ($bil_user_phone)    $query->where('bil_user_phone', $bil_user_phone);

        return $query;
    }
}
