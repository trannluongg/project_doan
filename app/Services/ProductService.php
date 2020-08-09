<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 15/07/2020
 * Time: 22:22
 */

namespace App\Services;


use App\Models\Cart;
use App\Repository\Product\ProductRepositoryInterface;
use App\Service\BaseService;
use App\Transformers\Product\ProductTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductService extends BaseService
{
    private $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getListProduct()
    {
        $filter_phone     = [
            'pro_brand'     => config('id_brand.phone'),
            'flag_field'    => true,
            'limit'         => 8
        ];

        $filter_laptop     = [
            'pro_brand'     => config('id_brand.laptop'),
            'flag_field'    => true,
            'limit'         => 8
        ];

        $filter_tablet   = [
            'pro_brand'     => config('id_brand.tablet'),
            'flag_field'    => true,
            'limit'         => 8
        ];

        $filter_pin   = [
            'pro_brand'     => config('id_brand.pin'),
            'flag_field'    => true,
            'limit'         => 8
        ];

        $filter_microphone   = [
            'pro_brand'     => config('id_brand.microphone'),
            'flag_field'    => true,
            'limit'         => 8
        ];

        $filter_accessories   = [
            'pro_brand'     => config('id_brand.accessories'),
            'flag_field'    => true,
            'limit'         => 8
        ];

        $fields     = 'name,price,image,sale,description,promotion,total,brand,category,producer,created_at';

        $product_phone      = $this->productRepository->getList($filter_phone,$fields);
        $product_laptop     = $this->productRepository->getList($filter_laptop,$fields);
        $product_tablet     = $this->productRepository->getList($filter_tablet,$fields);
        $product_pin        = $this->productRepository->getList($filter_pin,$fields);
        $product_microphone = $this->productRepository->getList($filter_microphone,$fields);
        $product_accessories= $this->productRepository->getList($filter_accessories,$fields);

        return [
            'phone'         => $this->responseDataCollection($product_phone, ProductTransformer::class),
            'laptop'        => $this->responseDataCollection($product_laptop, ProductTransformer::class),
            'tablet'        => $this->responseDataCollection($product_tablet, ProductTransformer::class),
            'pin'           => $this->responseDataCollection($product_pin, ProductTransformer::class),
            'microphone'    => $this->responseDataCollection($product_microphone, ProductTransformer::class),
            'accessories'   => $this->responseDataCollection($product_accessories, ProductTransformer::class)
        ];
    }

    public function getProductWithBrand($id_product = null, $id_brand = null)
    {
        $filter    = [
            'pro_brand'     => $id_brand,
            'pro_not'       => $id_product,
            'flag_field'    => true,
            'limit'         => 8
        ];

        $fields     = 'name,price,image,sale,description,promotion,total,brand,category,producer,created_at';

        $product      = $this->productRepository->getList($filter,$fields);

        return $this->responseDataCollection($product, ProductTransformer::class);
    }

    public function getProductNotBrandCurrent($id_brand = null)
    {
        $filter    = [
            'pro_brand_not' => $id_brand,
            'flag_field'    => true,
            'limit'         => 16
        ];

        $fields     = 'name,price,image,sale,description,promotion,total,brand,category,producer,created_at';

        $product      = $this->productRepository->getList($filter,$fields);

        return $this->responseDataCollection($product, ProductTransformer::class);
    }

    public function getProductSaleMax($brand_id = null, $limit = null)
    {
        $filter     = [
            'flag_field'    => true,
            'limit'         => $limit ?? 15,
            'brand_id'      => $brand_id,
            'order'         => [['sale', 'desc']]
        ];

        $fields     = 'name,price,image,sale,description,promotion,total,brand,category,producer,created_at';

        $product_max_sale = $this->productRepository->getList($filter,$fields);

        return $this->responseDataCollection($product_max_sale, ProductTransformer::class);
    }

    public function getProduct($id)
    {
        $product = $this->productRepository->firstById($id);

        return $this->responseItemData($product, ProductTransformer::class);
    }

    public function addToCart(Request $request, $id)
    {
        $qty    = $request->get('qty') ?? 1;
        $flag   = $request->get('flag') ?? 0;

        $product = $this->productRepository->firstById($id);

        $oldCart = Session::has('cart') ? Session::get('cart') : null;

        $cart = new Cart($oldCart);
        $add = $cart->add($product, $product->id, $qty, $flag);
        if ($add) $request->session()->put('cart', $cart);
        return $add;
    }

    public function getReduceByOne($id) {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);

        if (count($cart->items) > 0)
        {
            Session::put('cart', $cart);
        }
        else
        {
            Session::forget('cart');
        }
    }

    public function getRemoveItem($id) {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);

        if (count($cart->items) > 0)
        {
            Session::put('cart', $cart);
        }
        else
        {
            Session::forget('cart');
        }
    }

    public function getCart()
    {
        if (!Session::has('cart'))
        {
            return [];
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        return $cart;
    }

    public function getProductAjax(Request $request)
    {
        $key_search = $request->get('key_search');

        $filter    = [
            'key_search' => $key_search,
            'flag_field'    => true,
            'limit'         => 10
        ];

        $fields     = 'name,price,image,sale';

        $product      = $this->productRepository->getList($filter,$fields);

        return $this->responseDataCollection($product, ProductTransformer::class);
    }

    public function getListProductSearch(Request $request)
    {

        $price_sort = $request->get('price_sort') ?? 2;
        $price_sort = (intval($price_sort) == 0) ? 2 : $price_sort;

        if ($price_sort == 1) $order = [['price', 'desc']];
        else $order = [['price', 'asc']];

        $filter     = [
            'flag_field'    => true,
            'limit'         => 32,
            'order'         => $order,
            'pro_producer'  => $request->get('producer') ?? null,
            'pro_price'     => $request->get('price') ?? null
        ];

        $fields     = 'name,price,image,sale,description,promotion,total,brand,category,producer,created_at';

        $products      = $this->productRepository->getList($filter,$fields);

        return $this->responseDataCollection($products, ProductTransformer::class);
    }
}
