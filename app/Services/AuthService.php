<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 27/07/2020
 * Time: 00:00
 */

namespace App\Services;


use App\Core123\Auth\AuthMe;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Authorization;
use App\Repository\User\UserRepositoryInterface;
use App\Transformers\AuthorizationTransformer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class AuthService extends BaseService
{
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function register(UserRegisterRequest $request)
    {
        $data['id_sub']        = 0;
        $data['name']          = $request->get('name');
        $data['email']         = $request->get('email');
        $data['phone']         = $request->get('phone');
        $data['date_of_birth'] = $request->get('day') .'/'.$request->get('month').'/'.$request->get('year');
        $data['gender']        = $request->get('gender');
        $data['address']       = $request->get('address');
        $data['status']        = $request->get('status') ?? 1;
        $data['driver']        = $request->get('driver') ?? 'normal';
        $data['password']      = Hash::make($request->get('password'));
        $data['avatar']         = ($data['gender'] == 1) ? 'male.png' : 'female.png';

        $user = $this->userRepository->create($data);

        if ($user)
        {
            return $this->postLogin($request);
        }

        return $this->responseError([], trans('messages.error_login'), Response::HTTP_UNAUTHORIZED);
    }

    public function postLogin(Request $request)
    {
        $input     = $request->only('email', 'password');

        $jwt_token = null;

        if (!$jwt_token = Auth::guard('users')->attempt($input))
        {
            return $this->responseError([], trans('messages.error_login'), Response::HTTP_UNAUTHORIZED);
        }

        AuthMe::setTokenUser($jwt_token);

        $authorization = new Authorization($jwt_token);
        $data          = $this->fractalTransformerData($authorization, AuthorizationTransformer::class);
        return $this->responseSuccess(['data' => $data]);
    }

    public function logout()
    {
        Auth::guard('users')->logout();
        AuthMe::setTokenUser(null);
    }

    public function registerGoogle()
    {
        $user = Socialite::driver('google')->user();

        $email  = $user->getEmail();
        $name   = $user->getName();
        $id     = $user->getId();
        $avatar = $user->getAvatar();

        $check_user = $this->userRepository->checkUserEmailLoginGoogle($email);

        if (isset($check_user[0]))
        {
            $jwt_token = null;

            if (!$jwt_token = Auth::guard('users')->login($check_user[0]))
            {
                return $this->responseError([], trans('messages.error_login'), Response::HTTP_UNAUTHORIZED);
            }

            AuthMe::setTokenUser($jwt_token);

            $authorization = new Authorization($jwt_token);
            $data          = $this->fractalTransformerData($authorization, AuthorizationTransformer::class);
            return $this->responseSuccess(['data' => $data]);
        }
        else
        {
            $password_random        = Str::random(10);
            $name_file              = Carbon::now()->timestamp . '.jpg';
            $path_file              = 'upload/avatar/' . Carbon::now()->timestamp . '.jpg';

            file_put_contents($path_file, file_get_contents($avatar));

            $data['id_sub']        = $id;
            $data['name']          = $name;
            $data['email']         = $email;
            $data['phone']         = '';
            $data['date_of_birth'] = '';
            $data['gender']        = 1;
            $data['address']       = '';
            $data['status']        = 1;
            $data['driver']        = 'google';
            $data['password']      = Hash::make($password_random);
            $data['avatar']        = $name_file;

            $user_create = $this->userRepository->create($data);

            if ($user_create)
            {
                $jwt_token = null;

                if (!$jwt_token = Auth::guard('users')->attempt(['email' => $email, 'password' => $password_random]))
                {
                    return $this->responseError([], trans('messages.error_login'), Response::HTTP_UNAUTHORIZED);
                }

                AuthMe::setTokenUser($jwt_token);

                $authorization = new Authorization($jwt_token);
                $data          = $this->fractalTransformerData($authorization, AuthorizationTransformer::class);
                return $this->responseSuccess(['data' => $data]);
            }

            return $this->responseError(['error' => 'Error'], 'Error', Response::HTTP_NOT_FOUND);
        }
    }

    public function updateInfo(UserUpdateRequest $request, $id)
    {
        $data['email']          = $request->get('email');
        $data['phone']          = $request->get('phone');
        $data['name']           = $request->get('name');
        $data['date_of_birth']  = $request->get('day') .'/'.$request->get('month').'/'.$request->get('year');
        $data['gender']         = intval($request->get('gender'));
        $data['address']        = $request->get('address');
        $data['password']       = Hash::make($request->get('password'));

        $user = $this->userRepository->firstById(intval($id));

        if (!$user) return $this->responseErrorNotFound();

        $this->userRepository->updateById($id, $data);

        return $this->responseSuccess([], trans('messages.update_success'), Response::HTTP_OK);
    }

    public function updatePassword(Request $request, $id)
    {
        $data['password']       = Hash::make($request->get('password'));

        $user = $this->userRepository->firstById(intval($id));

        if (!$user) return $this->responseErrorNotFound();

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
