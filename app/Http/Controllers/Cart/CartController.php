<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 09/06/2020
 * Time: 21:15
 */

namespace App\Http\Controllers\Cart;


use App\Http\Controllers\Controller;
use App\Services\ProductService;

class CartController extends Controller
{
    private $productService;

    public function __construct(ProductService $productService)
    {
        parent::__construct();
        $this->productService = $productService;
    }

    public function index()
    {
        $cart = $this->productService->getCart();
        //dd($cart);
        return view('pages.cart.index', compact('cart'));
    }
}
