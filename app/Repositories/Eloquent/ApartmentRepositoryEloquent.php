<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ApartmentRepository;
use App\Entities\Apartment;
use App\Validators\ApartmentValidator;

/**
 * Class ApartmentRepositoryEloquent
 * @package namespace App\Repositories\Eloquent;
 */
class ApartmentRepositoryEloquent extends BaseRepository implements ApartmentRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Apartment::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return ApartmentValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
