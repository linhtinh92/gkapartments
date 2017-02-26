<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\BrandLogoRepository;
use App\Entities\BrandLogo;
use App\Validators\BrandLogoValidator;

/**
 * Class BrandLogoRepositoryEloquent
 * @package namespace App\Repositories\Eloquent;
 */
class BrandLogoRepositoryEloquent extends BaseRepository implements BrandLogoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return BrandLogo::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return BrandLogoValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
