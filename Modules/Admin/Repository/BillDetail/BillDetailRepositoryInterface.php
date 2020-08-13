<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 22/06/2020
 * Time: 22:45
 */

namespace Modules\Admin\Repository\BillDetail;


use App\Core123\RepositoryInterface;

interface BillDetailRepositoryInterface extends RepositoryInterface
{
    public function getList($filter = [], $columns = null, $paginate = null);

    public function getBillDetailId($bill_id);

    public function getBillDetailWithBillIdProId($bill_id = null, $product_id = null);

    public function updateBillDetailWithBillIdProId($bill_id = null, $product_id = null, $data_update = []);

    public function deleteBillDetailWithBillIdProId($bill_id = null, $product_id = null, $data_update = []);

    public function getCountProductBill();
}
