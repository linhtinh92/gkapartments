<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\ProductMeta;

/**
 * Class ProductMetaTransformer
 * @package namespace App\Transformers;
 */
class ProductMetaTransformer extends TransformerAbstract
{

    /**
     * Transform the \ProductMeta entity
     * @param \ProductMeta $model
     *
     * @return array
     */
    public function transform(ProductMeta $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
