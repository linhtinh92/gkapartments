<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Category extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = ['id', 'title', 'slug', 'parent', 'site_title', 'site_description', 'site_keyword', 'status'];

    public function product()
    {
        return $this->hasMany('App\Entities\Product','cate_id');
    }

    public function dequyMenu($cap = 0, $item = "")
    {

        $result = $this->parent($cap);
        if ($cap > 0 && $result != null) {
            $item .= '<div class="rayed"><div class="tas menu-last2">';
        }
        if ($result) {
            if ($cap == 0) {
                foreach ($result as $row) {
                    $item .= "<li><a href='" . url('/danh-muc/' . $row->slug) . "' title='" . $row->title . "'>" . $row->title . " <i class='fa fa-angle-down'></i></a >";
                    $item .= $this->dequyMenu($row->id, '');
                    $item .= "</li>";
                }
            } else {
                foreach ($result as $row) {
                    $item .= "<a href='" . url('/danh-muc/' . $row->slug) . "' title='" . $row->title . "'>" . $row->title . "</a >";
                }
            }

        }
        if ($cap > 0 && $result != null) {
            $item .= "</div></div>";
        }
        return $item;
    }

    public function dequyMenuMobile($level = 0, $item = "")
    {

        $result = $this->parent($level);
        if ($level > 0 && $result != null) {
            $item .= '<ul>';
        }
        if ($result) {
            foreach ($result as $row) {
                $item .= "<li><a href='" . url('/danh-muc/' . $row->slug) . "' title='" . $row->title . "'>" . $row->title . "</a >";
                $item .= $this->dequyMenuMobile($row->id, '');
                $item .= "</li>";
            }

        }
        if ($level > 0 && $result != null) {
            $item .= "</ul>";
        }
        return $item;
    }

    public function getArrIdCategory($cate_id, $arr){
        $result = $this->parent($cate_id);
        foreach ($result as $row) {
            array_push($arr,$row->id);
            $this->getArrIdCategory($row->id,$arr);
        }
        return $arr;
    }

    public function parent($parent = 0)
    {

        return $this->where('parent', $parent)->get();
    }

}
