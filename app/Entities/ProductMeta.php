<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class ProductMeta extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = ['id','product_id','key','slug','value','type'];

    public function product()
    {
        return $this->belongsTo('App\Entities\Product', 'product_id');
    }

}
