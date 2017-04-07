<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\RoomImage;

/**
 * Class RoomImageTransformer
 * @package namespace App\Transformers;
 */
class RoomImageTransformer extends TransformerAbstract
{

    /**
     * Transform the \RoomImage entity
     * @param \RoomImage $model
     *
     * @return array
     */
    public function transform(RoomImage $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
