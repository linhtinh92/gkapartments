@extends('frontend.master')
@section('content')
    <!-- mobile-menu-area end -->
    <div class="top-contact">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li class="p-none">
                            <a href="{{route('web.index')}}">
                                <i class="fa fa-home"></i>
                            </a>
                        </li>
                        <li>
                            <a class="current">Tìm kiếm</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="top-shop-area">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <div class="shop-around">
                        <div class="all-shop2-area">
                            <div class="filter-attribute-container">
                                <div class="block-title">
                                    <h2>Category</h2>
                                </div>
                                <div class="layered-content">
                                    <div class="cen-shop">
                                        <ul>
                                            @foreach($all_category as $cate)
                                                <li>
                                                    <a href="{{route('web.category',$cate->slug)}}"
                                                       title="{{$cate->title}}">{{$cate->title}}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 col-sm-9 col-sm-9">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="features-tab fe-again">
                                <!-- Nav tabs -->
                                <div class="shop-all-tab top-shop-n">
                                    <div class="two-part an-tw">
                                        <h3>Kết quả tìm kiếm cho '{{$search}}' ({{$products->total()}}) </h3>
                                    </div>
                                    @if($products->total() > 0)
                                        <div class="sort-by an-short">
                                            <div class="shop6">
                                                <label>Sort By</label>
                                                <select id="input-sort" onchange="location = this.value;">
                                                    <option value="{{route('web.timKiem').'?k='.$search}}">Default
                                                    </option>
                                                    <option value="{{route('web.timKiem').'?k='.$search}}&sort=name&order=ASC" {{$default_sort == "name" && $default_order == "ASC" ? 'selected' :''}}>
                                                        Tên (A - Z)
                                                    </option>
                                                    <option value="{{route('web.timKiem').'?k='.$search}}&sort=name&order=DESC" {{$default_sort == "name" && $default_order == "DESC" ? 'selected' :''}}>
                                                        Tên (Z - A)
                                                    </option>
                                                    <option value="{{route('web.timKiem').'?k='.$search}}&sort=price&order=ASC" {{$default_sort == "price" && $default_order == "ASC" ? 'selected' :''}}>
                                                        Giá (Thấp &gt; Cao)
                                                    </option>
                                                    <option value="{{route('web.timKiem').'?k='.$search}}&sort=price&order=DESC" {{$default_sort == "price" && $default_order == "DESC" ? 'selected' :''}}>
                                                        Giá (Cao &gt; Thấp)
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <!-- Tab panes -->
                                <div class="row">
                                    @if($products->total() > 0)
                                        <div class="shop-tab">
                                        @foreach($products as $product)
                                            <!-- single-product start -->
                                                <div class="col-md-4 col-sm-6">
                                                    <div class="slider-one">

                                                        <div class="single-product">
                                                            <div class="products-top">
                                                                @if($product->price_sale == 0)
                                                                    <p class="price special-price">
                                                                        <span class="price-new new2">{{number_format($product->price)}} {{$frontEndConfig['sub_money']}}</span>
                                                                    </p>
                                                                @else
                                                                    <p class="price special-price non">
                                                                        <span class="price-new">{{number_format($product->price_sale)}} {{$frontEndConfig['sub_money']}}</span><br>
                                                                        <span class="price-old">{{number_format($product->price)}} {{$frontEndConfig['sub_money']}}</span>
                                                                    </p>
                                                                @endif
                                                                <div class="product-img">
                                                                    <a href="{{route('web.productDetail',$product->slug)}}"
                                                                       title="{{$product->title}}">
                                                                        <img class="primary-image"
                                                                             alt="{{$product->title}}"
                                                                             src="{{url($product->avatar)}}">
                                                                        @if(count($product->ProductMeta) > 0)
                                                                            @foreach($product->ProductMeta as $productmeta)
                                                                                @if($productmeta->type == "img")
                                                                                    <img class="secondary-image"
                                                                                         alt="{{$productmeta->key}}"
                                                                                         src="{{url($productmeta->value)}}">
                                                                                    @break
                                                                                @endif
                                                                            @endforeach
                                                                        @endif
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="content-box again">
                                                                <h2 class="name">
                                                                    <a href="{{route('web.productDetail',$product->slug)}}"
                                                                       title="{{$product->title}}">
                                                                        {{$product->title}}
                                                                    </a>
                                                                </h2>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                                {{ $products->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop