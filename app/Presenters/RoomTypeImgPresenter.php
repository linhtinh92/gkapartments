<?php

namespace App\Presenters;

use App\Transformers\RoomTypeImgTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class RoomTypeImgPresenter
 *
 * @package namespace App\Presenters;
 */
class RoomTypeImgPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new RoomTypeImgTransformer();
    }
}
