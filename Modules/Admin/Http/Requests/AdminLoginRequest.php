<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 10/3/2020
 * Time: 9:41 AM
 */

namespace Modules\Admin\Http\Requests;


use Pearl\RequestValidate\RequestAbstract;

class AdminLoginRequest extends RequestAbstract
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(){
        return [
            'email'         => 'required|email',
            'password'      => 'required|min:3|max:32',
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
            'email.required'            => 'Email' . trans('messages.validate.required'),
            'email.email'               => 'Email' . trans('messages.validate.email_unique'),
            'password.required'         => trans('messages.validate.password') . trans('messages.validate.required'),
            'password.max'              => trans('messages.validate.password') . trans('messages.validate.max') . 32,
            'password.min'              => trans('messages.validate.password') . trans('messages.validate.min') . 3,
        ];
    }
}