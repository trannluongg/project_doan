<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 22/06/2020
 * Time: 23:02
 */

namespace Modules\Admin\Services;


use App\Service\BaseService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Modules\Admin\Http\Requests\User\UserCreateRequest;
use Modules\Admin\Http\Requests\User\UserEditRequest;
use Modules\Admin\Repository\User\UserRepositoryInterface;
use Modules\Admin\Transformers\User\UserTransformer;

class UserService extends BaseService
{
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function create(UserCreateRequest $request)
    {
        $data['id_sub']        = 0;
        $data['name']          = $request->get('name');
        $data['email']         = $request->get('email');
        $data['phone']         = $request->get('phone');
        $data['date_of_birth'] = $request->get('date_of_birth');
        $data['gender']        = $request->get('gender');
        $data['address']       = $request->get('address');
        $data['status']        = $request->get('status') ?? 1;
        $data['password']      = Hash::make($request->get('password'));
        $data['driver']        = 'normal';

        if ($request->hasFile('avatar'))
        {
            $file      = $request->file('avatar');

            $name = $file->getClientOriginalName();

            $name_image = Carbon::now()->timestamp . "_" . $name;

            $file->move("upload/avatar", $name_image);

            $data['avatar'] = $name_image;
        }
        else
        {
            $data['avatar'] = ($data['gender'] == 1) ? 'male.png' : 'female.png';
        }

        $user = $this->userRepository->create($data);

        return $this->responseCreatedSuccess($user, UserTransformer::class);
    }

    public function getList(Request $request)
    {
        $filter = [
            'id'         => $request->get('id'),
            'name'       => $request->get('name'),
            'email'      => $request->get('email'),
            'status'     => $request->get('status'),
            'order'      => $request->get('order'),
            'limit'      => $request->get('limit'),
        ];

        $fields = $request->get('fields') ?? 'name,email,phone,status,date_of_birth,gender,avatar,address,created_at';

        $paginate = $request->get('paginate') ?? 20;

        $user = $this->userRepository->getList($filter, $fields, $paginate);

        return $paginate ? $this->responseDataWithPaginator($user, UserTransformer::class, $request->all())
            : $this->responseDataCollection($user, UserTransformer::class);
    }

    public function show($id)
    {
        $user = $this->userRepository->firstById($id);

        if (!$user) return $this->responseErrorNotFound();

        return $this->responseItemData($user, UserTransformer::class);
    }

    public function edit(UserEditRequest $request, $id)
    {

        $data['name']          = $request->get('name');
        $data['email']         = $request->get('email');
        $data['phone']         = $request->get('phone');
        $data['date_of_birth'] = $request->get('date_of_birth');
        $data['gender']        = $request->get('gender');
        $data['address']       = $request->get('address');

        $user = $this->userRepository->firstById($id);

        if (!$user) return $this->responseErrorNotFound();

        $this->userRepository->updateById($id, $data);

        return $this->responseSuccess([], trans('messages.update_success'), Response::HTTP_OK);
    }

    public function updateActive(Request $request, $id)
    {
        $status         = $request->get('status');
        $data['status'] = $status;

        $this->userRepository->updateById($id, $data);

        return $this->responseSuccess([], trans('messages.update_success'), Response::HTTP_OK);
    }

    public function updateAvatar(Request $request, $id)
    {
        $user = $this->userRepository->firstById($id);

        if (!$user) return $this->responseErrorNotFound();

        if ($request->hasFile('avatar'))
        {
            $file      = $request->file('avatar');

            $name = $file->getClientOriginalName();

            $extension = $file->getClientOriginalExtension();

            if ($extension != 'jpg' && $extension != 'jpeg' && $extension != 'png')
            {
                return $this->responseError(['avatar' => ['The file is not in the correct format. Select files in formats jpg, png, jpeg']], 'Not Found', Response::HTTP_UNPROCESSABLE_ENTITY);
            }

            $name_image = Carbon::now()->timestamp . "_" . $name;

            $file->move("upload/avatar", $name_image);

            if ($user->avatar != 'male.png' && $user->avatar != 'female.png') unlink("upload/avatar/". $user->avatar);

            $data['avatar'] = $name_image;
        }
        else
        {
            $data['avatar'] = $user->avatar;
        }

        $this->userRepository->updateById($id, $data);

        return $this->responseSuccess([], trans('messages.update_success'), Response::HTTP_OK);
    }
}
