<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 21/3/2020
 * Time: 4:00 PM
 */

namespace Modules\Admin\Repository\Module;

use App\Core123\RepositoryInterface;

interface ModuleRepositoryInterface extends RepositoryInterface
{

    public function getList($filter = [], $fields = null, $paginate = null);

    public function findOneBy($filter = [], $fields = null);
}
