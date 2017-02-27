<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\About;

/**
 * Class AboutTransformer
 * @package namespace App\Transformers;
 */
class AboutTransformer extends TransformerAbstract
{

    /**
     * Transform the \About entity
     * @param \About $model
     *
     * @return array
     */
    public function transform(About $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
