<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\ApartmentImg;

/**
 * Class ApartmentImgTransformer
 * @package namespace App\Transformers;
 */
class ApartmentImgTransformer extends TransformerAbstract
{

    /**
     * Transform the \ApartmentImg entity
     * @param \ApartmentImg $model
     *
     * @return array
     */
    public function transform(ApartmentImg $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
