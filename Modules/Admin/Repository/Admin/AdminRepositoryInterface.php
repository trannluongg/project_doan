<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 15/06/2020
 * Time: 21:25
 */

namespace Modules\Admin\Repository\Admin;


use App\Core123\RepositoryInterface;

interface AdminRepositoryInterface extends RepositoryInterface
{
    public function getList($filter = [], $columns = null, $paginate = null);

    public function findOneBy($filter = [], $fields = null);
}
