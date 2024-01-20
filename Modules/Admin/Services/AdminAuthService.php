<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 15/06/2020
 * Time: 21:23
 */

namespace Modules\Admin\Services;


use App\Core123\Auth\AuthMe;
use App\Jobs\AssignRolePermissionAdmin;
use App\Models\Authorization;
use App\Models\Role;
use App\Services\BaseService;
use App\Transformers\AuthorizationTransformer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Modules\Admin\Http\Requests\AdminEditActiveRequest;
use Modules\Admin\Http\Requests\AdminEditInfoRequest;
use Modules\Admin\Http\Requests\AdminEditPasswordRequest;
use Modules\Admin\Http\Requests\AdminLoginRequest;
use Modules\Admin\Http\Requests\AdminRegisterRequest;
use Modules\Admin\Repository\Admin\AdminRepositoryInterface;
use Modules\Admin\Transformers\Admin\AdminTransformer;

class AdminAuthService extends BaseService
{
    private $adminRepository;

    public function __construct(AdminRepositoryInterface $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    public function createAdmin(AdminRegisterRequest $request)
    {
        $data['name']          = $request->get('name');
        $data['email']         = $request->get('email');
        $data['phone']         = $request->get('phone');
        $data['date_of_birth'] = $request->get('date_of_birth');
        $data['gender']        = $request->get('gender');
        $data['address']       = $request->get('address');
        $data['status']        = $request->get('status') ?? 1;
        $data['password']      = Hash::make($request->get('password'));
        $roles                 = $request->get('roles');
        $roles                 = json_decode($roles, 1);

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

        $admin = $this->adminRepository->create($data);

        if ($admin && !empty($roles)) dispatch(new AssignRolePermissionAdmin($admin, $roles));

        if ($admin)
        {
            return 'Ok';
        }
        return 'Fail';
    }

    public function postLogin(AdminLoginRequest $request)
    {
        $input     = $request->only('email', 'password');

        $jwt_token = null;

        if (!$jwt_token = Auth::guard('admins')->attempt($input))
        {
            return $this->responseError([], trans('messages.error_login'), Response::HTTP_UNAUTHORIZED);
        }

        AuthMe::setTokenAdmin($jwt_token);

        $authorization = new Authorization($jwt_token);
        $data          = $this->fractalTransformerData($authorization, AuthorizationTransformer::class);
        return $this->responseSuccess(['data' => $data]);
    }


    public function refresh()
    {
        $authorization = new Authorization(Auth::refresh());
        $data          = $this->fractalTransformerData($authorization, AuthorizationTransformer::class);
        return $this->responseSuccess(['data' => $data]);
    }

    public function logout()
    {
        Auth::guard('admins')->logout();
        AuthMe::setTokenAdmin(null);
    }

    public function getAdmin()
    {
        $admin = Auth::guard('admins')->user();
        $data  = $this->fractalTransformerData($admin, AdminTransformer::class);
        $admin_permissions = $admin->permissions;

        $permissions = [];

        if (!empty($admin_permissions))
        {
            foreach ($admin_permissions as $admin_per)
            {
                if ($admin_per['module_id'] == null)
                {
                    array_push($permissions, $admin_per['name']);
                }
            }
        }

        $data['permissions'] = $permissions;

        return $this->responseSuccess(['data' => $data]);
    }


    public function editPassword(AdminEditPasswordRequest $request)
    {
        $old_password = $request->old_password;
        $password     = $request->password;
        $admin        = Auth::guard('admins')->user();

        $auth = Auth::guard('admins')->once([
            'email'    => $admin->email,
            'password' => $old_password,
        ]);

        if (!$auth) return $this->response->errorUnauthorized();

        $password_new = app('hash')->make($password);

        $data             = [];
        $data['password'] = $password_new;

        $this->adminRepository->updateById($admin->id, $data);

        return $this->responseSuccess();
    }

    public function editInfo(AdminEditInfoRequest $request, $id)
    {
        $data['name']          = $request->get('name');
        $data['email']         = $request->get('email');
        $data['phone']         = $request->get('phone');
        $data['date_of_birth'] = $request->get('date_of_birth');
        $data['gender']        = $request->get('gender');
        $data['address']       = $request->get('address');
        $data['status']        = $request->get('status');
        $roles                 = $request->get('roles');
        $roles                 = json_decode($roles, 1);

        $admin = $this->adminRepository->firstById($id);

        if (!$admin) return $this->responseErrorNotFound();

        $this->adminRepository->updateById($id, $data);

        if ($admin && !empty($roles))
        {
            $admin->roles()->detach();
            $admin->syncPermissions();

            foreach ($roles as $role)
            {
                $role_r     = Role::where('id', $role)->firstOrFail();
                $permission = $role_r->permissions;
                $admin->givePermissionTo($permission);
                $admin->assignRole($role_r);
            }
        }
        else{
            $admin->roles()->detach();
            $admin->syncPermissions();
        }

        return $this->responseSuccess([], trans('messages.update_success'), Response::HTTP_OK);
    }

    public function updateActive(AdminEditActiveRequest $request, $id)
    {
        $status         = $request->status;
        $data           = [];
        $data['status'] = $status;
        $this->adminRepository->updateById($id, $data);
        return $this->responseSuccess([], trans('messages.update_success'), Response::HTTP_OK);
    }

    public function updateAvatar(Request $request, $id)
    {
        $admin = $this->adminRepository->firstById($id);

        if (!$admin) return $this->responseErrorNotFound();

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

            if ($admin->avatar != 'male.png' && $admin->avatar != 'female.png') unlink("upload/avatar/". $admin->avatar);

            $data['avatar'] = $name_image;
        }
        else
        {
            $data['avatar'] = $admin->avatar;
        }

        $this->adminRepository->updateById($id, $data);

        return $this->responseSuccess([], trans('messages.update_success'), Response::HTTP_OK);
    }

    public function getList(Request $request)
    {
        $include = [
            "roles_admin" => [
                'fields' => [
                    'id',
                    'identifier_name'
                ],
            ],
        ];

        $filter = [
            'id'         => $request->get('id'),
            'name'       => $request->get('name'),
            'email'      => $request->get('email'),
            'status'     => $request->get('status'),
            'role'       => $request->get('role'),
            'order'      => $request->get('order'),
            'limit'      => $request->get('limit'),
            'include'    => $request->get('include') ?? json_encode($include)
        ];

        $fields = $request->get('fields') ?? 'name,email,phone,status,date_of_birth,gender,avatar,address,created_at';

        $paginate = $request->get('paginate') ?? 20;

        $admin = $this->adminRepository->getList($filter, $fields, $paginate);

        return $paginate ? $this->responseDataWithPaginator($admin, AdminTransformer::class, $request->all())
            : $this->responseDataCollection($admin, AdminTransformer::class);
    }

    public function find($id)
    {
        $admin = $this->adminRepository->firstById($id);

        if (!$admin) return $this->responseErrorNotFound();

        return $this->responseItemData($admin, AdminTransformer::class);
    }

    public function findOneBy(Request $request, $id)
    {
        $include = [
            "roles_admin" => [
                'fields' => [
                    'id',
                    'identifier_name'
                ],
            ],
        ];

        $filter = [
            'id'      => $id,
            'include' => $request->get('include') ?? json_encode($include)
        ];

        $fields = $request->get('fields') ?? 'name,email,phone,status,date_of_birth,gender,avatar,address';

        $user = $this->adminRepository->findOneBy($filter, $fields);

        if (!$user) return $this->responseErrorNotFound();

        return $this->responseItemData($user, AdminTransformer::class);
    }
}
