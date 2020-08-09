<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 10/3/2020
 * Time: 4:18 PM
 */

namespace Modules\Admin\Http\Requests;

use Modules\Admin\Repository\Admin\AdminRepositoryInterface;
use Pearl\RequestValidate\RequestAbstract;

class AdminEditInfoRequest extends RequestAbstract
{
    private $adminRepository;

    public function __construct(AdminRepositoryInterface $adminRepository, array $query = [], array $request = [], array $attributes = [], array $cookies = [], array $files = [], array $server = [], $content = null)
    {
        parent::__construct($query, $request, $attributes, $cookies, $files, $server, $content);
        $this->adminRepository = $adminRepository;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $admin = $this->adminRepository->firstById($this->id);
        return [
            'name'              => 'required|string|max:50|min:5',
            'email'             => 'required|email|unique:admins,email,'.$admin->id,
            'phone'             => 'required|string|regex:/^[0-9]{2}[0-9]{8}$/',
            'date_of_birth'     => 'required|string|regex:/^[0-9]{1,2}(\/)[0-9]{1,2}(\/)[0-9\s]{4}$/',
            'gender'            => 'required|numeric',
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
            'phone.required'            => trans('messages.validate.phone') . trans('messages.validate.required'),
            'phone.string'              => trans('messages.validate.phone') . trans('messages.validate.string'),
            'phone.regex'               => trans('messages.validate.phone') . trans('messages.validate.regex'),
            'date_of_birth.required'    => trans('messages.validate.date_of_birth') . trans('messages.validate.required'),
            'date_of_birth.string'      => trans('messages.validate.date_of_birth') . trans('messages.validate.string'),
            'date_of_birth.regex'       => trans('messages.validate.date_of_birth') . trans('messages.validate.regex'),
            'gender.required'           => trans('messages.validate.gender') . trans('messages.validate.required'),
            'gender.numeric'            => trans('messages.validate.gender') . trans('messages.validate.numeric'),
        ];
    }
}
