<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 1/4/2020
 * Time: 3:00 PM
 */

namespace Modules\Admin\Http\Requests\ModuleGroup;


use Pearl\RequestValidate\RequestAbstract;

class ModuleGroupEditRequest extends RequestAbstract
{
    public function rules()
    {
        return [
            'name' => 'required|string|max:50|min:2|unique:modules_group,mog_name,' . $this->id,
            'order' => 'required|numeric'
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
            'name.required' => trans('messages.validate.name') . trans('messages.validate.required'),
            'name.string' => trans('messages.validate.name') . trans('messages.validate.string'),
            'name.max' => trans('messages.validate.name') . trans('messages.validate.max') . 50,
            'name.min' => trans('messages.validate.name') . trans('messages.validate.min') . 2,
            'name.unique' => trans('messages.validate.name') . trans('messages.validate.name_unique'),
            'order.required' => trans('messages.validate.order') . trans('messages.validate.required'),
            'order.number' => trans('messages.validate.order') . trans('messages.validate.number'),
        ];
    }
}
