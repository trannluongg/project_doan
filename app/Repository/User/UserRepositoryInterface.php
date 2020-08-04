<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 26/07/2020
 * Time: 15:40
 */

namespace App\Repository\User;


use App\Core123\RepositoryInterface;

interface UserRepositoryInterface extends RepositoryInterface
{
    public function checkUserEmailLoginGoogle($email = null);
}
