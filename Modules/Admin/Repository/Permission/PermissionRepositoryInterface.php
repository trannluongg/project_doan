<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 11/3/2020
 * Time: 11:10 AM
 */

namespace Modules\Admin\Repository\Permission;

use App\Core123\RepositoryInterface;

interface PermissionRepositoryInterface extends RepositoryInterface
{

    public function getList($filter = [], $fields = null, $paginate = null);

    public function findOneBy($filter = [], $fields = null);
}
