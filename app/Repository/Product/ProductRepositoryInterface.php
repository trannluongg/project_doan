<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 15/07/2020
 * Time: 22:24
 */

namespace App\Repository\Product;


use App\Core123\RepositoryInterface;

interface ProductRepositoryInterface extends RepositoryInterface
{
    public function getList($filter = [], $columns = null, $paginate = null);
}
