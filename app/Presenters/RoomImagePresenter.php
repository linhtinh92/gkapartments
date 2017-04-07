<?php

namespace App\Presenters;

use App\Transformers\RoomImageTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class RoomImagePresenter
 *
 * @package namespace App\Presenters;
 */
class RoomImagePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new RoomImageTransformer();
    }
}
