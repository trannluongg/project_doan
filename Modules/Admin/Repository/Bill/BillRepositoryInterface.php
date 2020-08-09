<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 22/06/2020
 * Time: 22:45
 */

namespace Modules\Admin\Repository\Bill;


use App\Core123\RepositoryInterface;

interface BillRepositoryInterface extends RepositoryInterface
{
    public function getList($filter = [], $columns = null, $paginate = null);
}
