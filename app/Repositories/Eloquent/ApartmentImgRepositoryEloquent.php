<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Apartment_imgRepository;
use App\Entities\ApartmentImg;
use App\Validators\ApartmentImgValidator;

/**
 * Class ApartmentImgRepositoryEloquent
 * @package namespace App\Repositories\Eloquent;
 */
class ApartmentImgRepositoryEloquent extends BaseRepository implements ApartmentImgRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ApartmentImg::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return ApartmentImgValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
