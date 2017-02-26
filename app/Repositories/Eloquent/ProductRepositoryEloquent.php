<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\productRepository;
use App\Entities\Product;
use App\Validators\ProductValidator;

/**
 * Class ProductRepositoryEloquent
 * @package namespace App\Repositories\Eloquent;
 */
class ProductRepositoryEloquent extends BaseRepository implements ProductRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Product::class;
    }

    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator()
    {

        return ProductValidator::class;
    }

    public function getProductSearch($key, $request)
    {
        $title = $request != null ? strip_tags($request->sort) : '';
        $order = $request != null ? strip_tags($request->order) : "";

        if ($title == "name") {
            $title = "title";
            switch ($order) {
                case "ASC" :
                    $order = "ASC";
                    break;
                case "DESC" :
                    $order = "DESC";
                    break;
                default:
                    $order = "DESC";
            }
        } else if ($title == "price") {
            $title = "price";
            switch ($order) {
                case "ASC" :
                    $order = "ASC";
                    break;
                case "DESC" :
                    $order = "DESC";
                    break;
                default:
                    $order = "DESC";
            }
        } else {
            $title = "created_at";
            $order = "DESC";
        }

        return $this->model->where('title', 'like', '%' . $key . '%')->orderBy($title, $order)->paginate(6);
    }

    /**
     * @param $arr_cate
     * @param $request
     * @return mixed
     */
    public function getProductByCatetegoryPaginate($arr_cate, $request)
    {
        $title = $request != null ? strip_tags($request->sort) : '';
        $order = $request != null ? strip_tags($request->order) : "";

        if ($title == "name") {
            $title = "title";
            switch ($order) {
                case "ASC" :
                    $order = "ASC";
                    break;
                case "DESC" :
                    $order = "DESC";
                    break;
                default:
                    $order = "DESC";
            }
        } else if ($title == "price") {
            $title = "price";
            switch ($order) {
                case "ASC" :
                    $order = "ASC";
                    break;
                case "DESC" :
                    $order = "DESC";
                    break;
                default:
                    $order = "DESC";
            }
        } else {
            $title = "created_at";
            $order = "DESC";
        }
        return $this->model->whereIn('cate_id', $arr_cate)->orderBy($title, $order)->paginate(6);
    }

    public function getRelatedProduct($cate_id, $product_id)
    {
        return $this->model->where('cate_id', $cate_id)->where('id', '!=', $product_id)->inRandomOrder()->limit(8)->get()->toArray();
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
