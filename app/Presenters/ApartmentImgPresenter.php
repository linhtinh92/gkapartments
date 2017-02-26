<?php

namespace App\Presenters;

use App\Transformers\ApartmentImgTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ApartmentImgPresenter
 *
 * @package namespace App\Presenters;
 */
class ApartmentImgPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ApartmentImgTransformer();
    }
}
