<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 10/3/2020
 * Time: 3:14 PM
 */

namespace Modules\Admin\Http\Requests;


use Pearl\RequestValidate\RequestAbstract;

class AdminEditPasswordRequest extends RequestAbstract
{

    /**
     * @return array
     */
    public function rules(){
        return [
            'old_password'          => 'required|min:3|string|max:32',
            'password'              => 'required|string|confirmed|min:3|max:32|different:old_password',
            'password_confirmation' => 'required|same:password',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function messages(): array
    {
        return [
            'old_password.required'             => trans('messages.validate.old_password') . trans('messages.validate.required'),
            'old_password.string'               => trans('messages.validate.old_password') . trans('messages.validate.string'),
            'old_password.max'                  => trans('messages.validate.old_password') . trans('messages.validate.max') . 32,
            'old_password.min'                  => trans('messages.validate.old_password') . trans('messages.validate.min') . 3,
            'password.required'                 => trans('messages.validate.password') . trans('messages.validate.required'),
            'password.max'                      => trans('messages.validate.password') . trans('messages.validate.max') . 32,
            'password.min'                      => trans('messages.validate.password') . trans('messages.validate.min') . 3,
            'password.string'                   => trans('messages.validate.password') . trans('messages.validate.string'),
            'password.confirmed'                => trans('messages.validate.confirmed'),
            'password.different'                => trans('messages.validate.password_confirm') . trans('messages.validate.different'),
            'password_confirmation.required'    => trans('messages.validate.password_confirm') . trans('messages.validate.required'),
            'password_confirmation.same'        => trans('messages.validate.password_confirm') . trans('messages.validate.same'),
        ];
    }
}