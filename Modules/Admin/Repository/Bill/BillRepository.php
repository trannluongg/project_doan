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
}
