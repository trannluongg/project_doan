<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 22/06/2020
 * Time: 22:43
 */

namespace Modules\Admin\Repository\Producer;


use App\Core123\RepositoryInterface;

interface ProducerRepositoryInterface extends RepositoryInterface
{
    public function getList($filter = [], $columns = null, $paginate = null);
}
