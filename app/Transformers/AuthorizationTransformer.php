<?php
/**
 * Created by PhpStorm.
 * User: Hungokata
 * Date: 1/16/19
 * Time: 23:19
 */

namespace App\Transformers;

use App\Models\Authorization;

class AuthorizationTransformer extends Transformer
{
    public function transform(Authorization $authorization)
    {
        return $authorization->toArray();
    }

    public function setRelations()
    {
    }
}