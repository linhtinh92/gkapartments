<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class RoomType extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = ['apartment_id'
        ,'title'
        ,'slug'
        ,'sumary'
        ,'area'
        ,'price'
        ,'video'
        ,'pay'
        ,'excludes'
        ,'includes'
        ,'meta_description'
        ,'meta_keywords'
        ,'status'];

}
