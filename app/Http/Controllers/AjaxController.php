<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 05/08/2020
 * Time: 23:12
 */

namespace App\Http\Controllers;


use App\Services\ProducerService;
use App\Services\ProductService;
use Illuminate\Http\Request;

class AjaxController
{
    private $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function getProductAjax(Request $request)
    {
        return $this->productService->getProductAjax($request)->getContent();
    }
}
