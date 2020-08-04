<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 23/07/2020
 * Time: 23:57
 */

namespace App\Repository\Brand;


use App\Core123\RepositoryInterface;

interface BrandRepositoryInterface extends RepositoryInterface
{
    public function getList($filter = [], $columns = null, $paginate = null);
}
