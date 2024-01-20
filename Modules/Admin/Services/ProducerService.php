<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 22/06/2020
 * Time: 23:03
 */

namespace Modules\Admin\Services;


use App\Services\BaseService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Admin\Http\Requests\Producer\ProducerCreatedRequest;
use Modules\Admin\Http\Requests\Producer\ProducerEditRequest;
use Modules\Admin\Repository\Producer\ProducerRepositoryInterface;
use Modules\Admin\Transformers\Producer\ProducerTransformer;

class ProducerService extends BaseService
{
    private $producerRepository;

    public function __construct(ProducerRepositoryInterface $producerRepository)
    {
        $this->producerRepository = $producerRepository;
    }

    public function create(ProducerCreatedRequest $request)
    {
        $data['pro_name']          = $request->get('name');

        if ($request->hasFile('avatar'))
        {
            $file      = $request->file('avatar');

            $name = $file->getClientOriginalName();

            $name_image = Carbon::now()->timestamp . "_" . $name;

            $file->move("upload/producer", $name_image);

            $data['pro_avatar'] = $name_image;
        }
        else
        {
            $data['pro_avatar'] = 'company.png';
        }

        $producer = $this->producerRepository->create($data);

        return $this->responseCreatedSuccess($producer, ProducerTransformer::class);
    }

    public function getList(Request $request, $is_paginate = true)
    {
        $filter  = [
            'id'            => $request->get('id'),
            'pro_name'      => $request->get('pro_name'),
            'date_range'    => $request->get('date_range'),
            'order'         => $request->get('order'),
            'limit'         => $request->get('limit'),
            'include'       => $request->get('include')
        ];

        $fields = $request->get('fields') ?? 'name,avatar,created_at';
        $paginate       = $request->get('paginate') ?? ($is_paginate ? 20 : null);

        $producer = $this->producerRepository->getList($filter,$fields , $paginate);

        return $paginate ? $this->responseDataWithPaginator($producer, ProducerTransformer::class, $request->all())
            : $this->responseDataCollection($producer, ProducerTransformer::class);
    }

    public function show($id)
    {
        $module = $this->producerRepository->firstById($id);

        if (!$module) return $this->responseErrorNotFound();

        $data = $this->fractalTransformerData($module, ProducerTransformer::class);

        return $this->responseSuccess(['data' => $data]);
    }

    public function edit(ProducerEditRequest $request, $id)
    {
        $data['pro_name']          = $request->get('name');

        $producer = $this->producerRepository->firstById($id);

        if (!$producer) return $this->responseErrorNotFound();

        if ($request->hasFile('avatar'))
        {
            $file      = $request->file('avatar');

            $name = $file->getClientOriginalName();

            $name_image = Carbon::now()->timestamp . "_" . $name;

            $file->move("upload/producer", $name_image);

            if ($producer->pro_avatar != 'company.png') unlink("upload/producer/". $producer->pro_avatar);

            $data['pro_avatar'] = $name_image;
        }
        else
        {
            $data['pro_avatar'] = $producer->pro_avatar;
        }

        $this->producerRepository->updateById($id, $data);

        return $this->responseSuccess([], trans('messages.update_success'), Response::HTTP_OK);
    }
}
