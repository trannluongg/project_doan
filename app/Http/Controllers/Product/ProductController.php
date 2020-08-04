<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 08/06/2020
 * Time: 21:24
 */

namespace App\Http\Controllers\Product;


use App\Http\Controllers\Controller;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    private $productService;

    public function __construct(ProductService $productService)
    {
        parent::__construct();
        $this->productService = $productService;
    }

    public function index()
    {
        return view('pages.product_detail.index');
    }

    public function getProduct($id)
    {
        $product = $this->productService->getProduct($id);
        $product = json_decode($product->content(), 1);
        $product = $product['data']['data'];

        if (empty($product)) abort(404);

        $product_brand_id = $product['brand'];

        $product_same = $this->productService->getProductWithBrand($id, $product_brand_id);
        $product_same = json_decode($product_same->content(), 1);
        $product_same = $product_same['data'];

        $product_not_brand = $this->productService->getProductNotBrandCurrent($product_brand_id);
        $product_not_brand = json_decode($product_not_brand->content(), 1);
        $product_not_brand = $product_not_brand['data'];

        return view('pages.product_detail.index', compact('product', 'product_same', 'product_not_brand'));
    }

    public function getAddToCart(Request $request, $id)
    {
//        Session::forget('cart');
//        Session::flush();
        $add = $this->productService->addToCart($request, $id);
        if ($add)  return Session::has('cart') ? json_encode(Session::get('cart')) : json_encode( []);
        else return response()->json([], Response::HTTP_NOT_FOUND);
    }

    public function getCart()
    {
        return response()->json($this->productService->getCart(), Response::HTTP_OK);
    }

    public function removeToCart($id)
    {
        $this->productService->getRemoveItem($id);
        return Session::has('cart') ? json_encode(Session::get('cart')) : json_encode( []);
    }

    public function removeOneToCart($id)
    {
        $this->productService->getReduceByOne($id);
        return Session::has('cart') ? json_encode(Session::get('cart')) : json_encode( []);
    }
}
