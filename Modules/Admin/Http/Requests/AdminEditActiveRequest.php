<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 10/3/2020
 * Time: 5:28 PM
 */

namespace Modules\Admin\Http\Requests;


use Pearl\RequestValidate\RequestAbstract;

class AdminEditActiveRequest extends RequestAbstract
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(){
        return [
            'status'      => 'required|numeric'
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
            'status.required'           => trans('messages.validate.required'),
            'status.numeric'            => trans('messages.validate.numeric'),
        ];
    }
}