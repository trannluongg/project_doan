<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 22/06/2020
 * Time: 23:04
 */

namespace Modules\Admin\Services;


use App\Service\BaseService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Admin\Http\Requests\Bill\BillCreateRequest;
use Modules\Admin\Http\Requests\Bill\BillEditRequest;
use Modules\Admin\Repository\Bill\BillRepositoryInterface;
use Modules\Admin\Transformers\Bill\BillTransformer;

class BillService extends BaseService
{
    private $billRepository;

    public function __construct(BillRepositoryInterface $billRepository)
    {
        $this->billRepository = $billRepository;
    }

    public function create(BillCreateRequest $request)
    {

    }

    public function getList(Request $request)
    {
        $filter  = [
            'id'            => $request->get('id'),
            'user_id'       => $request->get('user_id'),
            'user_phone'    => $request->get('user_phone'),
            'date_range'    => $request->get('date_range'),
            'order'         => $request->get('order'),
            'limit'         => $request->get('limit'),
        ];

        $fields = $request->get('fields') ?? 'username,user_address,user_phone,sum_money,status,created_at';
        $paginate       = $request->get('paginate') ?? 20;

        $bill = $this->billRepository->getList($filter,$fields , $paginate);

        return $paginate ? $this->responseDataWithPaginator($bill, BillTransformer::class, $request->all())
            : $this->responseDataCollection($bill, BillTransformer::class);
    }

    public function show($id)
    {
        $bill = $this->billRepository->firstById($id);

        if (!$bill) return $this->responseErrorNotFound();

        $bill = $this->fractalTransformerData($bill, BillTransformer::class);

        return $this->responseSuccess(['data' => $bill]);
    }

    public function edit(BillEditRequest $request, $id)
    {
        $data['bil_username']       = $request->get('username');
        $data['bil_user_address']   = $request->get('user_address');
        $data['bil_user_phone']     = $request->get('user_phone');

        $bill = $this->billRepository->firstById($id);

        if (!$bill) return $this->responseErrorNotFound();

        $this->billRepository->updateById($id, $data);

        return $this->responseSuccess([], trans('messages.update_success'), Response::HTTP_OK);
    }

    public function updateBillStatus(Request $request, $id)
    {
        $data['bil_status'] = $request->get('status');

        $bill = $this->billRepository->firstById($id);

        if (!$bill) return $this->responseErrorNotFound();

        $this->billRepository->updateById($id, $data);

        return $this->responseSuccess([], trans('messages.update_success'), Response::HTTP_OK);
    }
}
