<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 06/08/2020
 * Time: 20:02
 */

namespace App\Repository\Bill;


use App\Core123\EloquentRepository;
use App\Models\Bills;

class BillRepository extends EloquentRepository implements BillRepositoryInterface
{
    public function __construct(Bills $bills)
    {
        $this->model = $bills;
    }
}
