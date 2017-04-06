<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\RoomTypeRepository;
use App\Entities\RoomType;
use App\Validators\RoomTypeValidator;

/**
 * Class RoomTypeRepositoryEloquent
 * @package namespace App\Repositories\Eloquent;
 */
class RoomTypeRepositoryEloquent extends BaseRepository implements RoomTypeRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return RoomType::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return RoomTypeValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
