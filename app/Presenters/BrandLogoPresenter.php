<?php

namespace App\Presenters;

use App\Transformers\BrandLogoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class BrandLogoPresenter
 *
 * @package namespace App\Presenters;
 */
class BrandLogoPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new BrandLogoTransformer();
    }
}
