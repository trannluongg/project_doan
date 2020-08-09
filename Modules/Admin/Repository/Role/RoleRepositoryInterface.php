<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 11/3/2020
 * Time: 5:08 PM
 */

namespace Modules\Admin\Repository\Role;

use App\Core123\RepositoryInterface;

interface RoleRepositoryInterface extends RepositoryInterface
{

    public function getList($filter = [], $fields = null, $paginate = null);

    public function findOneBy($filter = [], $fields = null);
}
