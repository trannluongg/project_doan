<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 9/3/2020
 * Time: 4:44 PM
 */

namespace Modules\Admin\Http\Requests;


use Pearl\RequestValidate\RequestAbstract;

class AdminRegisterRequest extends RequestAbstract
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(){
        return [
            'name'              => 'required|string|max:50|min:5',
            'email'             => 'required|email|unique:admins,email',
            'password'          => 'required|string|min:3|max:32',
            'password_confirm'  => 'required|string|same:password',
            'address'           => 'required|string|max:50|min:5',
            'phone'             => 'required|string|regex:/^[0-9]{2}[0-9]{8}$/',
            'date_of_birth'     => 'required|string|regex:/^[0-9]{1,2}(\/)[0-9]{1,2}(\/)[0-9\s]{4}$/',
            'gender'            => 'required|numeric',
            'avatar'            => 'mimes:jpeg,png,jpg|max:1024000'
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
            'name.required'             => trans('messages.validate.name') . trans('messages.validate.required'),
            'name.string'               => trans('messages.validate.name') . trans('messages.validate.string'),
            'name.max'                  => trans('messages.validate.name') . trans('messages.validate.max') . 50,
            'name.min'                  => trans('messages.validate.name') . trans('messages.validate.min') . 5,
            'email.required'            => 'Email' . trans('messages.validate.required'),
            'email.email'               => 'Email' . trans('messages.validate.email'),
            'email.unique'              => 'Email' . trans('messages.validate.unique'),
            'password.required'         => trans('messages.validate.password') . trans('messages.validate.required'),
            'password.max'              => trans('messages.validate.password') . trans('messages.validate.max') . 32,
            'password.min'              => trans('messages.validate.password') . trans('messages.validate.min') . 3,
            'password.string'           => trans('messages.validate.password') . trans('messages.validate.string'),
            'password_confirm.required' => trans('messages.validate.password_confirm') . trans('messages.validate.required'),
            'password_confirm.string'   => trans('messages.validate.password_confirm') . trans('messages.validate.string'),
            'password_confirm.same'     => trans('messages.validate.password_confirm') . trans('messages.validate.same'),
            'address.required'          => trans('messages.validate.name') . trans('messages.validate.required'),
            'address.string'            => trans('messages.validate.name') . trans('messages.validate.string'),
            'address.max'               => trans('messages.validate.name') . trans('messages.validate.max') . 50,
            'address.min'               => trans('messages.validate.name') . trans('messages.validate.min') . 5,
            'phone.required'            => trans('messages.validate.phone') . trans('messages.validate.required'),
            'phone.string'              => trans('messages.validate.phone') . trans('messages.validate.string'),
            'phone.regex'               => trans('messages.validate.phone') . trans('messages.validate.regex'),
            'date_of_birth.required'    => trans('messages.validate.date_of_birth') . trans('messages.validate.required'),
            'date_of_birth.string'      => trans('messages.validate.date_of_birth') . trans('messages.validate.string'),
            'date_of_birth.regex'       => trans('messages.validate.date_of_birth') . trans('messages.validate.regex'),
            'gender.required'           => trans('messages.validate.gender') . trans('messages.validate.required'),
            'gender.numeric'            => trans('messages.validate.gender') . trans('messages.validate.numeric'),
            'avatar.mimes'              => trans('messages.validate.file_format'),
            'avatar.max'                => trans('messages.validate.file_size_max'),
        ];
    }
}
