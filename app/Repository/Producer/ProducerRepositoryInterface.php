<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 05/08/2020
 * Time: 22:28
 */

namespace App\Repository\Producer;


use App\Core123\RepositoryInterface;

interface ProducerRepositoryInterface extends RepositoryInterface
{
    public function getList($filter = [], $columns = null, $paginate = null);
}
