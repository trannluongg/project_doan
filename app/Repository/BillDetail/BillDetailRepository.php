<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 06/08/2020
 * Time: 20:07
 */

namespace App\Repository\BillDetail;


use App\Core123\EloquentRepository;
use App\Models\BillDetail;

class BillDetailRepository extends EloquentRepository implements BillDetailRepositoryInterface
{
    public function __construct(BillDetail $billDetail)
    {
        $this->model = $billDetail;
    }
}
