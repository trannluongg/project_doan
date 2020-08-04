<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 23/07/2020
 * Time: 23:55
 */

namespace App\Services;


use App\Repository\Brand\BrandRepositoryInterface;
use App\Service\BaseService;
use App\Transformers\Brand\BrandTransformer;

class BrandService extends BaseService
{
    private $brandRepository;

    public function __construct(BrandRepositoryInterface $brandRepository)
    {
        $this->brandRepository = $brandRepository;
    }

    public function getListBrandMenu()
    {
        $filter     = [
            'flag_field'    => true,
            'limit'         => 10
        ];

        $fields     = 'name,icon,slug';

        $brands = $this->brandRepository->getList($filter, $fields);

        return $this->responseDataCollection($brands, BrandTransformer::class);
    }
}
