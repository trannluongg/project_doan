<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 23/06/2020
 * Time: 00:03
 */

namespace Modules\Admin\Http\Requests\Bill;


use Pearl\RequestValidate\RequestAbstract;

class BillCreateRequest extends RequestAbstract
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user'              => 'required|numeric|min:1',
            'username'          => 'required|string|max:50|min:5',
            'user_address'      => 'required|string|max:50|min:5',
            'user_phone'        => 'required|string|regex:/^[0-9]{2}[0-9]{8}$/',
            'sum_money'         => 'required|numeric|min:4',
            'status'            => 'required|numeric|min:1'
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
            'user.required'            => trans('messages.validate.total') . trans('messages.validate.required'),
            'user.numeric'             => trans('messages.validate.total') . trans('messages.validate.numeric'),
            'user.min'                 => trans('messages.validate.total') . trans('messages.validate.min') . 1,
            'username.required'        => trans('messages.validate.name') . trans('messages.validate.required'),
            'username.string'          => trans('messages.validate.name') . trans('messages.validate.string'),
            'username.max'             => trans('messages.validate.name') . trans('messages.validate.max') . 50,
            'username.min'             => trans('messages.validate.name') . trans('messages.validate.min') . 5,
            'user_address.required'    => trans('messages.validate.name') . trans('messages.validate.required'),
            'user_address.string'      => trans('messages.validate.name') . trans('messages.validate.string'),
            'user_address.max'         => trans('messages.validate.name') . trans('messages.validate.max') . 50,
            'user_address.min'         => trans('messages.validate.name') . trans('messages.validate.min') . 5,
            'user_phone.required'      => trans('messages.validate.phone') . trans('messages.validate.required'),
            'user_phone.string'        => trans('messages.validate.phone') . trans('messages.validate.string'),
            'user_phone.regex'         => trans('messages.validate.phone') . trans('messages.validate.regex'),
            'sum_money.required'       => trans('messages.validate.total') . trans('messages.validate.required'),
            'sum_money.numeric'        => trans('messages.validate.total') . trans('messages.validate.numeric'),
            'sum_money.min'            => trans('messages.validate.total') . trans('messages.validate.min') . 4,
            'status.required'          => trans('messages.validate.total') . trans('messages.validate.required'),
            'status.numeric'           => trans('messages.validate.total') . trans('messages.validate.numeric'),
            'status.min'               => trans('messages.validate.total') . trans('messages.validate.min') . 1,
        ];
    }
}
