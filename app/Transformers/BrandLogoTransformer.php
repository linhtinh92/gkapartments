<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\BrandLogo;

/**
 * Class BrandLogoTransformer
 * @package namespace App\Transformers;
 */
class BrandLogoTransformer extends TransformerAbstract
{

    /**
     * Transform the \BrandLogo entity
     * @param \BrandLogo $model
     *
     * @return array
     */
    public function transform(BrandLogo $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
