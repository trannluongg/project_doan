<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 23/06/2020
 * Time: 00:00
 */

namespace Modules\Admin\Http\Requests\Category;


use Pearl\RequestValidate\RequestAbstract;

class CategoryCreateRequest extends RequestAbstract
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'              => 'required|string|max:50|min:5|unique:category,cat_name',
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
            'name.unique'               => trans('messages.validate.name') . trans('messages.validate.name_unique')
        ];
    }
}
