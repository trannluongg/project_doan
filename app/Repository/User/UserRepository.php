<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 26/07/2020
 * Time: 15:39
 */

namespace App\Repository\User;


use App\Core123\EloquentRepository;
use App\Models\User;

class UserRepository extends EloquentRepository implements UserRepositoryInterface
{
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function checkUserEmailLoginGoogle($email = null)
    {
        $user = $this->model->where('email', $email)
                            ->limit(1)->get();
        return $user;
    }
}
