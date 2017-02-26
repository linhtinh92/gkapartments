<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\Config;
use App\Entities\Category;
use App\Entities\BrandLogo;
use Cart;


class BaseFrontController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $configs = Config::getAllconfigs();
        view()->share('frontEndConfig',$configs);
        $this->getMenuFront();
        $this->getMenuFrontMobile();
        $this->getBrands();
    }

    protected function getMenuFront(){
        $category = new Category();
        $menu = $category->dequyMenu();
        view()->share("mainMenu",$menu);
    }
    protected function getMenuFrontMobile(){
        $category = new Category();
        $menuMobile = $category->dequyMenuMobile(0,"");
        view()->share("mainMenuMoblie",$menuMobile);
    }
    protected function getBrands(){
        $brands = BrandLogo::all();
        view()->share("brands",$brands);
    }
}
