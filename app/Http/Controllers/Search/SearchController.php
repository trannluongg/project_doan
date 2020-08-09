<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 07/06/2020
 * Time: 16:13
 */

namespace App\Http\Controllers\Search;


use App\Http\Controllers\Controller;
use App\Services\ProducerService;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

class SearchController extends Controller
{
    private $productService;
    private $producerService;

    public function __construct(ProductService $productService,
                                ProducerService $producerService)
    {
        parent::__construct();
        $this->productService = $productService;
        $this->producerService = $producerService;
    }

    public function index(Request $request)
    {
        $agent = new Agent();

        $producers = $this->producerService->getAllProducer();
        $producers = json_decode($producers->getContent(), 1);
        $producers = $producers['data'];

        $products = $this->productService->getListProductSearch($request);
        $products = json_decode($products->getContent(), 1);
        $products = $products['data'];

        if ($agent->isMobile()){
            return view('pages.search.index_mobile');
        }
        else{
            return view('pages.search.index', compact('products', 'producers'));
        }
    }
}
