<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 22/06/2020
 * Time: 23:59
 */

namespace Modules\Admin\Http\Requests\Product;


use Pearl\RequestValidate\RequestAbstract;

class ProductCreateRequest extends RequestAbstract
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'              => 'required|string|max:255|min:5',
            'price'             => 'required|numeric|digits_between:4,10',
            'sale'              => 'numeric|digits_between:1,3',
            'description'       => 'required|string',
            'total'             => 'required|numeric|digits_between:1,3'
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
            'name.min'                  => trans('messages.validate.name') . trans('messages.validate.min') . 5,
            'price.required'            => trans('messages.validate.price') . trans('messages.validate.required'),
            'price.numeric'             => trans('messages.validate.price') . trans('messages.validate.numeric'),
            'price.digits_between'      => trans('messages.validate.price') . trans('messages.validate.digits_between') .'4 - 10',
            'sale.numeric'              => trans('messages.validate.sale') . trans('messages.validate.numeric'),
            'sale.digits_between'      => trans('messages.validate.price') . trans('messages.validate.digits_between') .'1 - 3',
            'total.required'            => trans('messages.validate.total') . trans('messages.validate.required'),
            'total.numeric'             => trans('messages.validate.total') . trans('messages.validate.numeric'),
            'total.digits_between'      => trans('messages.validate.price') . trans('messages.validate.digits_between') .'1 - 4',
            'description.required'      => trans('messages.validate.name') . trans('messages.validate.required'),
            'description.string'        => trans('messages.validate.name') . trans('messages.validate.string'),
        ];
    }
}
