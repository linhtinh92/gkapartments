<?php

namespace App\Presenters;

use App\Transformers\CheckoutTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class CheckoutPresenter
 *
 * @package namespace App\Presenters;
 */
class CheckoutPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new CheckoutTransformer();
    }
}
