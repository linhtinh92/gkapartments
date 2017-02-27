<?php

namespace App\Presenters;

use App\Transformers\AboutTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class AboutPresenter
 *
 * @package namespace App\Presenters;
 */
class AboutPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new AboutTransformer();
    }
}
