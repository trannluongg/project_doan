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
use Modules\Admin\Http\Requests\Category\CategoryCreateRequest;
use Modules\Admin\Http\Requests\Category\CategoryEditRequest;
use Modules\Admin\Repository\Category\CategoryRepositoryInterface;
use Modules\Admin\Transformers\Category\CategoryTransformer;

class CategoryService extends BaseService
{
    private $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function create(CategoryCreateRequest $request)
    {
        $data['cat_name']          = $request->get('name');

        $category = $this->categoryRepository->create($data);

        return $this->responseCreatedSuccess($category, CategoryTransformer::class);
    }

    public function getList(Request $request, $is_paginate = true)
    {
        $filter  = [
            'id'            => $request->get('id'),
            'cat_name'      => $request->get('cat_name'),
            'date_range'    => $request->get('date_range'),
            'order'         => $request->get('order'),
            'limit'         => $request->get('limit'),
            'include'       => $request->get('include')
        ];
        $fields = $request->get('fields') ?? 'name,created_at';
        $paginate       = $request->get('paginate') ?? ($is_paginate ? 20 : null);

        $category = $this->categoryRepository->getList($filter,$fields , $paginate);

        return $paginate ? $this->responseDataWithPaginator($category, CategoryTransformer::class, $request->all())
            : $this->responseDataCollection($category, CategoryTransformer::class);
    }

    public function show($id)
    {
        $category = $this->categoryRepository->firstById($id);

        if (!$category) return $this->responseErrorNotFound();

        $data = $this->fractalTransformerData($category, CategoryTransformer::class);

        return $this->responseSuccess(['data' => $data]);
    }

    public function edit(CategoryEditRequest $request, $id)
    {
        $data['cat_name']          = $request->get('name');

        $category = $this->categoryRepository->firstById($id);

        if (!$category) return $this->responseErrorNotFound();

        $this->categoryRepository->updateById($id, $data);

        return $this->responseSuccess([], trans('messages.update_success'), Response::HTTP_OK);
    }
}
