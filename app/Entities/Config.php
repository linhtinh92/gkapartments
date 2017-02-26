<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Config extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = ['id','option_key','option_value'];

    /**
     * @return array
     */
    public static function getAllconfigs()
    {
        $result = [];
        $configs = static::get();
        if ($configs) {
            foreach ($configs as $key => $row) {
                $result[$row->option_key] = $row->option_value;
            }
        }
        return $result;
    }

}
