<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 22/06/2020
 * Time: 23:02
 */

namespace Modules\Admin\Services;


use App\Service\BaseService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Admin\Http\Requests\Product\ProductCreateRequest;
use Modules\Admin\Http\Requests\Product\ProductEditRequest;
use Modules\Admin\Repository\Product\ProductRepositoryInterface;
use Modules\Admin\Transformers\Product\ProductTransformer;

class ProductService extends BaseService
{
    private $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function create(ProductCreateRequest $request)
    {
        $data = $this->handelData($request);

        if ($request->hasFile('images'))
        {
            $files = $request->file('images');
            $list_image = $this->handelImage($files);
            $data['pro_image'] = $list_image;
        }
        else
        {
            $data['pro_image'] = 'product.png';
        }
        $producer = $this->productRepository->create($data);

        return $this->responseCreatedSuccess($producer, ProductTransformer::class);
    }

    public function getList(Request $request)
    {
        $include = ["producers"=>["fields"=>["id","name"]], "brands"=>["fields"=>["id","name"]], "category"=>["fields"=>["id","name"]]];

        $filter  = [
            'id'            => $request->get('id'),
            'pro_name'      => $request->get('pro_name'),
            'pro_brand'     => $request->get('pro_brand'),
            'pro_producer'  => $request->get('pro_producer'),
            'pro_category'  => $request->get('pro_category'),
            'pro_price'     => $request->get('pro_price'),
            'date_range'    => $request->get('date_range'),
            'order'         => $request->get('order'),
            'limit'         => $request->get('limit'),
            'include'       => $request->get('include') ?? json_encode($include)
        ];
        $fields = $request->get('fields') ?? 'name,price,image,sale,description,promotion,total,brand,category,producer,created_at';
        $paginate       = $request->get('paginate') ?? 20;

        $product = $this->productRepository->getList($filter,$fields , $paginate);

        return $paginate ? $this->responseDataWithPaginator($product, ProductTransformer::class, $request->all())
            : $this->responseDataCollection($product, ProductTransformer::class);
    }

    public function show($id)
    {
        $product = $this->productRepository->firstById($id);

        if (!$product) return $this->responseErrorNotFound();

        $data = $this->fractalTransformerData($product, ProductTransformer::class);

        return $this->responseSuccess(['data' => $data]);
    }

    public function edit(ProductEditRequest $request, $id)
    {
        $data = $this->handelData($request);

        $product = $this->productRepository->firstById($id);

        if (!$product) return $this->responseErrorNotFound();

        if ($request->hasFile('images'))
        {
            $files = $request->file('images');

            $list_image = $this->handelImage($files);

            if ($product->pro_image != 'product.png') $this->unlinkImage($product->pro_image);

            $data['pro_image'] = $list_image;
        }
        else
        {
            $data['pro_image'] = $product->pro_image;
        }
        $this->productRepository->updateById($id, $data);

        return $this->responseSuccess([], trans('messages.update_success'), Response::HTTP_OK);
    }

    public function unlinkImage($images = '')
    {
        if ($images != '')
        {
            $arr_images = explode('|', $images);

            foreach ($arr_images as $image)
            {
                unlink("upload/product/". $image);
            }
        }
    }

    public function handelData($request)
    {
        $data['pro_name']           = $request->get('name');
        $data['pro_price']          = $request->get('price');
        $data['pro_sale']           = $request->get('sale');
        $data['pro_description']    = $request->get('description');
        $data['pro_total']          = $request->get('total');
        $data['pro_brand']          = $request->get('brand');
        $data['pro_producer']       = $request->get('producer');
        $data['pro_category']       = $request->get('category');
        $data['pro_promotion']      = $request->get('promotion');

        return $data;
    }

    public function handelImage($files)
    {
        $list_image = '';

        foreach($files as $index => $file)
        {
            $name = $file->getClientOriginalExtension();
            $name_image = Carbon::now()->timestamp . "_" . $index . '.' . $name;
            $file->move("upload/product", $name_image);

            if ($index < count($files) - 1)
            {
                $list_image .= $name_image . '|';
            }
            else{
                $list_image .= $name_image;
            }

        }

        return $list_image;
    }
}
