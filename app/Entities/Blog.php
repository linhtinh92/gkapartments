<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Blog extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = ['id','title','images','description','link','status'];

}
