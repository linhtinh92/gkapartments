<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\checkoutRepository;
use App\Entities\Checkout;
use App\Validators\CheckoutValidator;

/**
 * Class CheckoutRepositoryEloquent
 * @package namespace App\Repositories\Eloquent;
 */
class CheckoutRepositoryEloquent extends BaseRepository implements CheckoutRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Checkout::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return CheckoutValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
