<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\RoomTypeImgRepository;
use App\Entities\RoomTypeImg;
use App\Validators\RoomTypeImgValidator;

/**
 * Class RoomTypeImgRepositoryEloquent
 * @package namespace App\Repositories\Eloquent;
 */
class RoomTypeImgRepositoryEloquent extends BaseRepository implements RoomTypeImgRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return RoomTypeImg::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return RoomTypeImgValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
