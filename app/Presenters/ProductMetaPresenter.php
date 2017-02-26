<?php

namespace App\Presenters;

use App\Transformers\ProductMetaTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ProductMetaPresenter
 *
 * @package namespace App\Presenters;
 */
class ProductMetaPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ProductMetaTransformer();
    }
}
