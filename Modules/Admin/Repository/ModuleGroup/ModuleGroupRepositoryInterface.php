<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 1/4/2020
 * Time: 3:12 PM
 */

namespace Modules\Admin\Repository\ModuleGroup;


use App\Core123\RepositoryInterface;

interface ModuleGroupRepositoryInterface extends RepositoryInterface
{
    public function getList($filter = [], $fields = null, $paginate = null);

    public function findOneBy($filter = [], $fields = null);
}
