<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\roomImageRepository;
use App\Entities\RoomImage;
use App\Validators\RoomImageValidator;

/**
 * Class RoomImageRepositoryEloquent
 * @package namespace App\Repositories\Eloquent;
 */
class RoomImageRepositoryEloquent extends BaseRepository implements RoomImageRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return RoomImage::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return RoomImageValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
