<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 22/06/2020
 * Time: 23:02
 */

namespace Modules\Admin\Services;


use App\Service\BaseService;
use Illuminate\Http\Request;
use Modules\Admin\Http\Requests\User\UserCreateRequest;
use Modules\Admin\Http\Requests\User\UserEditRequest;
use Modules\Admin\Repository\User\UserRepositoryInterface;

class UserService extends BaseService
{
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function create(UserCreateRequest $request)
    {

    }

    public function getList(Request $request)
    {

    }

    public function show($id)
    {

    }

    public function edit(UserEditRequest $request, $id)
    {

    }
}
