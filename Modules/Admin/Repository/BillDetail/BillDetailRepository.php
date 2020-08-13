<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 22/06/2020
 * Time: 22:44
 */

namespace Modules\Admin\Repository\BillDetail;


use App\Core123\EloquentRepository;
use App\Models\BillDetail;
use Illuminate\Support\Facades\DB;

class BillDetailRepository extends EloquentRepository implements BillDetailRepositoryInterface
{
    public function __construct(BillDetail $billDetail)
    {
        $this->model = $billDetail;
    }

    public function getList($filter = [], $columns = null, $paginate = null)
    {
        $limit          = $filter['limit'] ?? null;

        $query = $this->createQuery($filter, $columns);

        return $limit ? $query->limit($limit)->get() : $query->get();
    }

    public function createQuery($filter = [], $fields = null)
    {
        $bil_id = $filter['bill_id'] ?? null;

        $query = $this->model->whereRaw(1);

        $query = $this->scopeQuery($query, $filter, $fields);

        if ($bil_id) $query->where('bid_bill_id', $bil_id);

        return $query;
    }

    public function getBillDetailId($bill_id)
    {
        return $this->model->where('bid_bill_id', $bill_id)->get();
    }

    public function getBillDetailWithBillIdProId($bill_id = null, $product_id = null)
    {
        return $this->model->where('bid_bill_id', $bill_id)->where('bid_product_id', $product_id)->get();
    }

    public function updateBillDetailWithBillIdProId($bill_id = null, $product_id = null, $data_update = [])
    {
        return $this->model->where('bid_bill_id', $bill_id)->where('bid_product_id', $product_id)->update($data_update);
    }

    public function deleteBillDetailWithBillIdProId($bill_id = null, $product_id = null, $data_update = [])
    {
        return $this->model->where('bid_bill_id', $bill_id)->where('bid_product_id', $product_id)->delete();
    }


    public function getCountProductBill()
    {
        return $this->model->join('products', 'bill_details.bid_product_id', '=', 'products.id')
                            ->select('products.pro_name', 'bill_details.bid_product_id', DB::raw('SUM(bill_details.bid_product_quantity) as total'))
                            ->groupBy('bill_details.bid_product_id')
                            ->orderBy('total')
                            ->limit(5)
                            ->get();

    }
}
