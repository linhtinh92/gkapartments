<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Checkout;

/**
 * Class CheckoutTransformer
 * @package namespace App\Transformers;
 */
class CheckoutTransformer extends TransformerAbstract
{

    /**
     * Transform the \Checkout entity
     * @param \Checkout $model
     *
     * @return array
     */
    public function transform(Checkout $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
