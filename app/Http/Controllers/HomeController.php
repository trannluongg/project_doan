<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 02/06/2020
 * Time: 22:59
 */

namespace App\Http\Controllers;


use App\Services\ProductService;

class HomeController extends Controller
{
    private $productService;

    public function __construct(ProductService $productService)
    {
        parent::__construct();
        $this->productService = $productService;
    }

    public function index()
    {
        $data_product = $this->productService->getListProduct();

        $data_phone = $data_product['phone'];
        $data_phone = json_decode($data_phone->content(), 1);
        $data_phone = $data_phone['data'];

        $data_laptop = $data_product['laptop'];
        $data_laptop = json_decode($data_laptop->content(), 1);
        $data_laptop = $data_laptop['data'];

        $data_tablet = $data_product['tablet'];
        $data_tablet = json_decode($data_tablet->content(), 1);
        $data_tablet = $data_tablet['data'];

        $data_pin = $data_product['pin'];
        $data_pin = json_decode($data_pin->content(), 1);
        $data_pin = $data_pin['data'];

        $data_microphone = $data_product['microphone'];
        $data_microphone = json_decode($data_microphone->content(), 1);
        $data_microphone = $data_microphone['data'];

        $data_accessories = $data_product['accessories'];
        $data_accessories = json_decode($data_accessories->content(), 1);
        $data_accessories = $data_accessories['data'];

        $data_sale_max = $this->productService->getProductSaleMax();
        $data_sale_max = json_decode($data_sale_max->content(), 1);
        $data_sale_max = $data_sale_max['data'];


        $data_view = [
            'data_phone'        => $data_phone,
            'data_laptop'       => $data_laptop,
            'data_tablet'       => $data_tablet,
            'data_pin'          => $data_pin,
            'data_microphone'   => $data_microphone,
            'data_accessories'  => $data_accessories,
            'data_max_sale'     => $data_sale_max
        ];

        return view('pages.home.index')->with($data_view);
    }
}
