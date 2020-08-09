<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 06/08/2020
 * Time: 20:03
 */

namespace App\Repository\Bill;


use App\Core123\RepositoryInterface;

interface BillRepositoryInterface extends RepositoryInterface
{
    public function getBillWithUser($user_id = null);
}
