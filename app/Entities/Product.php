<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Product extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = ['id',
        'cate_id',
        'title',
        'slug',
        'price',
        'price_sale',
        'avatar',
        'description',
        'content',
        'site_title',
        'site_description',
        'site_keyword',
        'featured_product',
        'new_product',
        'bestseller_product',
        'status'];

    public function category()
    {
        return $this->belongsTo('App\Entities\Category', 'cate_id');
    }

    public function ProductMeta()
    {
        return $this->hasMany('App\Entities\ProductMeta');
    }

}
