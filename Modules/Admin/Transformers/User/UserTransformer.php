<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 22/06/2020
 * Time: 22:03
 */

namespace Modules\Admin\Transformers\User;


use App\Models\User;
use App\Transformers\Transformer;
use Modules\Admin\Transformers\Bill\BillTransformer;

class UserTransformer extends Transformer
{
    public function transform(User $user)
    {
        $data = [
            'id'                => $user->id,
            'name'              => $user->name,
            'email'             => $user->email,
            'password'          => $user->password,
            'address'           => $user->address,
            'phone'             => $user->phone,
            'avatar'            => $user->avatar,
            'gender'            => $user->gender,
            'date_of_birth'     => $user->date_of_birth,
            'status'            => $user->status,
            'created_at'        => $user->created_at ? $user->created_at->toDateTimeString() : null,
            'updated_at'        => $user->updated_at ? $user->updated_at->toDateTimeString() : null,
        ];

        return $this->responseData($user, $data);
    }

    function setRelations()
    {
        $this->relations = [
            'user_bills' => BillTransformer::class
        ];
    }
}
