<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Checkout extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = ['id','fullname','company_name','email','phone','province','district','address','note','code','status','checkout_type','total','subtotal'];

    public function getProvince(){
        return $this->belongsTo('App\Entities\Location', 'province');
    }

    public function getDistrict(){
        return $this->belongsTo('App\Entities\Location', 'district');
    }

    public function getShopCart(){
        return $this->hasMany('App\Entities\Cart');
    }
}
