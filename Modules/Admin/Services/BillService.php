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
use Modules\Admin\Http\Requests\Bill\BillCreateRequest;
use Modules\Admin\Http\Requests\Bill\BillEditRequest;
use Modules\Admin\Repository\Bill\BillRepositoryInterface;

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

    }

    public function show($id)
    {

    }

    public function edit(BillEditRequest $request, $id)
    {

    }
}
