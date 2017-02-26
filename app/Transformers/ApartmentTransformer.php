<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Apartment;

/**
 * Class ApartmentTransformer
 * @package namespace App\Transformers;
 */
class ApartmentTransformer extends TransformerAbstract
{

    /**
     * Transform the \Apartment entity
     * @param \Apartment $model
     *
     * @return array
     */
    public function transform(Apartment $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
