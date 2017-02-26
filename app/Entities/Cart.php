<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Cart extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = ['id','product_id','checkout_id','product_name','product_qty','product_avatar','product_price'];

}
