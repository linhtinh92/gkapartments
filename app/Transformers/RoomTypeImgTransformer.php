<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\RoomTypeImg;

/**
 * Class RoomTypeImgTransformer
 * @package namespace App\Transformers;
 */
class RoomTypeImgTransformer extends TransformerAbstract
{

    /**
     * Transform the \RoomTypeImg entity
     * @param \RoomTypeImg $model
     *
     * @return array
     */
    public function transform(RoomTypeImg $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
