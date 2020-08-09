<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 28/3/2020
 * Time: 1:07 PM
 */

namespace Modules\Admin\Http\Requests;


use Pearl\RequestValidate\RequestAbstract;

class AdminUpdateAvatar extends RequestAbstract
{
    /**
    * Get the validation rules that apply to the request.
    *
    * @return array
    */
    public function rules(){
        return [
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
            'avatar.mimes'              => trans('messages.validate.file_format'),
            'avatar.max'                => trans('messages.validate.file_size_max'),
        ];
    }
}