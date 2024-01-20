<?php

namespace App\Services;
use Illuminate\Http\Response;

class BaseService
{
    public function responseError(array $error = [], $message = '', $status = Response::HTTP_INTERNAL_SERVER_ERROR)
    {
        $message = $message ? $message : trans('messages.error');

        $response = array_merge([
            'status_code' => $status,
            'message' => $message
        ], $error);

        return response($response)->setStatusCode($status);
    }

    public function responseErrorNotFound($message = '')
    {
        $message = $message ? $message : trans('messages.not_found');

        $response = ['status_code' => Response::HTTP_NOT_FOUND, 'message' => $message];

        return response($response)->setStatusCode(Response::HTTP_NOT_FOUND);
    }

    public function responseErrorUnAuthorization()
    {
        return $this->responseError([], trans('messages.un_authorization'), Response::HTTP_UNAUTHORIZED);
    }

    public function responseSuccess(array $data = [], $message = 'Successfully', $status = Response::HTTP_OK)
    {
        $response = array_merge([
            'status_code' => $status,
            'message' => $message
        ], $data);

        return response($response)->setStatusCode($status);
    }

    public function responseDataWithPaginator($data, $transformer, $queryParams = null, $status = Response::HTTP_OK)
    {
        $queryParams = array_diff_key($queryParams, array_flip(['page']));
        $data->appends($queryParams);

        $response = fractal($data,
            $transformer)->paginateWith(new \League\Fractal\Pagination\IlluminatePaginatorAdapter($data))->toArray();

        return $this->responseSuccess($response, trans('messages.get_data_success'), $status);
    }

    public function responseDataCollection($data, $transformer, $status = Response::HTTP_OK)
    {
        $response = fractal($data, $transformer)->toArray();

        return $this->responseSuccess($response, trans('messages.get_data_success'), $status);
    }

    public function responseItemData($data, $transformer, $status = Response::HTTP_OK)
    {
        $response = ['data' => fractal($data, $transformer)->toArray()];

        return $this->responseSuccess($response, trans('messages.get_item_success'), $status);
    }

    public function responseCreatedSuccess($item, $transformer, $status = Response::HTTP_CREATED)
    {
        $response = ['data' => fractal()->item($item)->transformWith($transformer)->toArray()];

        return $this->responseSuccess($response, trans('messages.create_success'), $status);
    }

    public function fractalTransformerData($data, $transformer)
    {
        return fractal()->item($data)->transformWith($transformer)->toArray();
    }

    public function getUser()
    {
        return \Auth::guard('users')->user();
    }

    public function getAdmin()
    {
        return \Auth::guard('admins')->user();
    }

}

