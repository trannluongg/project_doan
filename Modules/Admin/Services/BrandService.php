<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 22/06/2020
 * Time: 23:03
 */

namespace Modules\Admin\Services;


use App\Service\BaseService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Admin\Http\Requests\Brand\BrandCreateRequest;
use Modules\Admin\Http\Requests\Brand\BrandEditRequest;
use Modules\Admin\Repository\Brand\BrandRepositoryInterface;
use Modules\Admin\Transformers\Brand\BrandTransformer;

class BrandService extends BaseService
{
    private $brandRepository;

    public function __construct(BrandRepositoryInterface $brandRepository)
    {
        $this->brandRepository = $brandRepository;
    }

    public function create(BrandCreateRequest $request)
    {
        $data['bra_name']          = $request->get('name');
        $data['bra_icon']          = $request->get('icon') ?? 'fab fa-product-hunt';
        $data['bra_slug']          = $request->get('slug') ?? '';

        $brand = $this->brandRepository->create($data);

        return $this->responseCreatedSuccess($brand, BrandTransformer::class);
    }

    public function getList(Request $request, $is_paginate = true)
    {
        $filter  = [
            'id'            => $request->get('id'),
            'bra_name'      => $request->get('bra_name'),
            'date_range'    => $request->get('date_range'),
            'order'         => $request->get('order'),
            'limit'         => $request->get('limit'),
            'include'       => $request->get('include')
        ];
        $fields = $request->get('fields') ?? 'name,icon,slug,created_at';
        $paginate       = $request->get('paginate') ?? ($is_paginate ? 20 : null);

        $brand = $this->brandRepository->getList($filter,$fields , $paginate);

        return $paginate ? $this->responseDataWithPaginator($brand, BrandTransformer::class, $request->all())
            : $this->responseDataCollection($brand, BrandTransformer::class);
    }

    public function show($id)
    {
        $brand = $this->brandRepository->firstById($id);

        if (!$brand) return $this->responseErrorNotFound();

        $data = $this->fractalTransformerData($brand, BrandTransformer::class);

        return $this->responseSuccess(['data' => $data]);
    }

    public function edit(BrandEditRequest $request, $id)
    {
        $data['bra_name']          = $request->get('name');
        $data['bra_icon']          = $request->get('icon') ?? 'fab fa-product-hunt';
        $data['bra_slug']          = $request->get('slug') ?? '';

        $brand = $this->brandRepository->firstById($id);

        if (!$brand) return $this->responseErrorNotFound();

        $this->brandRepository->updateById($id, $data);

        return $this->responseSuccess([], trans('messages.update_success'), Response::HTTP_OK);
    }
}
