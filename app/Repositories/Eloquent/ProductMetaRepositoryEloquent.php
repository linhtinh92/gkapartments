<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ProductMetaRepository;
use App\Entities\ProductMeta;
use App\Validators\ProductMetaValidator;

/**
 * Class ProductMetaRepositoryEloquent
 * @package namespace App\Repositories\Eloquent;
 */
class ProductMetaRepositoryEloquent extends BaseRepository implements ProductMetaRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ProductMeta::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return ProductMetaValidator::class;
    }

    public function deleteByProduct($product_id){
        $metas = $this->findByField("product_id",$product_id);
        foreach ($metas as $meta){
            $meta->delete();
        }
        return true;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
