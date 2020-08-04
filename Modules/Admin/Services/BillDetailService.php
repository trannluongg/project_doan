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
use Modules\Admin\Repository\BillDetail\BillDetailRepositoryInterface;

class BillDetailService extends BaseService
{
    private $billDetailRepository;

    public function __construct(BillDetailRepositoryInterface $billDetailRepository)
    {
        $this->billDetailRepository = $billDetailRepository;
    }

    public function create(Request $request)
    {

    }

    public function getList(Request $request)
    {

    }

    public function show($id)
    {

    }

    public function edit(Request $request, $id)
    {

    }
}
