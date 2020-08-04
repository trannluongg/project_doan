<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 22/06/2020
 * Time: 23:59
 */

namespace Modules\Admin\Http\Requests\Producer;


use Pearl\RequestValidate\RequestAbstract;

class ProducerCreatedRequest extends RequestAbstract
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'              => 'required|string|max:255|min:2|unique:producers,pro_name',
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
            'name.max'                  => trans('messages.validate.name') . trans('messages.validate.max') . 255,
            'name.min'                  => trans('messages.validate.name') . trans('messages.validate.min') . 2,
            'name.unique'               => trans('messages.validate.name') . trans('messages.validate.name_unique'),
        ];
    }
}
