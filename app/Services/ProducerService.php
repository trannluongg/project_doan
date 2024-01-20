<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 05/08/2020
 * Time: 22:27
 */

namespace App\Services;


use App\Repository\Producer\ProducerRepositoryInterface;
use App\Transformers\Producer\ProducerTransformer;

class ProducerService extends BaseService
{
    private $producerRepository;

    public function __construct(ProducerRepositoryInterface $producerRepository)
    {
        $this->producerRepository = $producerRepository;
    }

    public function getAllProducer()
    {
        $filter     = [
            'flag_field'    => true,
            'limit'         => 100
        ];

        $fields     = 'name,avatar';

        $brands = $this->producerRepository->getList($filter, $fields);

        return $this->responseDataCollection($brands, ProducerTransformer::class);
    }


}
