<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 22/06/2020
 * Time: 22:44
 */

namespace Modules\Admin\Repository\Brand;


use App\Core123\RepositoryInterface;

interface BrandRepositoryInterface extends RepositoryInterface
{
    public function getList($filter = [], $columns = null, $paginate = null);
}
