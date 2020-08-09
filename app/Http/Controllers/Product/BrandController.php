<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 07/06/2020
 * Time: 14:07
 */

namespace App\Http\Controllers\Product;


use App\Http\Controllers\Controller;
use App\Services\BrandService;
use App\Services\ProducerService;
use App\Services\ProductService;

class BrandController extends Controller
{
    private $productService;
    private $brandService;
    private $producerService;

    public function __construct(ProductService $productService,
                                BrandService $brandService,
                                ProducerService $producerService)
    {
        parent::__construct();
        $this->productService = $productService;
        $this->brandService = $brandService;
        $this->producerService = $producerService;
    }

    public function index($brand)
    {
        $brand = $this->brandService->getBrandWithSlug($brand);
        $brand_id = $brand->id;
        $brand_name = $brand->bra_name;

        $products = $this->productService->getProductWithBrand(null, $brand_id);

        $products = json_decode($products->getContent(), 1);

        $products = $products['data'];

        $product_max_sale = $this->productService->getProductSaleMax($brand_id, 8);

        $product_max_sale = json_decode($product_max_sale->getContent(), 1);

        $product_max_sale = $product_max_sale['data'];

        $producer = $this->producerService->getAllProducer();

        $producer = json_decode($producer->getContent(), 1);

        $producer = $producer['data'];

        $dataView = [
            'products'          => $products,
            'product_max_sale'  => $product_max_sale,
            'title'             => $brand_name,
            'producer'          => $producer
        ];

        return view('pages.product.index')->with($dataView);
    }
}
