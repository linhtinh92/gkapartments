@extends('frontend.master')
@section('content')
    <section class="slider-main-area">
        <div class="main-slider an-si">
            <div class="bend niceties preview-2">
                <div id="ensign-nivoslider-2" class="slides">
                    @foreach($sliders as $slider)
                        <img src="{{$slider->images}}" alt="{{$slider->title}}"
                             title="#slider-direction-{{$slider->id}}"/>
                    @endforeach
                </div>
            @foreach($sliders as $slider)
                <!-- direction 1 -->
                    <div id="slider-direction-{{$slider->id}}" class="t-cn slider-direction Builder">
                        <div class="slide-all">
                            <!-- layer 1 -->
                            <div class="layer-1">
                                <h2 class="title5">{{$slider->title}}</h2>
                            </div>
                            <!-- layer 2 -->
                            <div class="layer-2">
                                <h2 class="title6">{{$slider->description}}</h2>
                            </div>
                            <!-- layer 3 -->
                            <div class="layer-3">
                                <a class="min1" href="{{$slider->link}}">Mua Ngay</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <div class="banner-area1">
        <div class="container">

        </div>
    </div>
    <section class="featured-container">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-group-parent">
                        <div class="title-group2">
                            <h2>Sản Phẩm Nỗi Bật</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="active-slider se7 indicator-style2">
                    @foreach($product_featured as $array_product)
                        <div class="col-md-3">
                            <div class="slider-one">
                                @foreach($array_product as $product)
                                    <div class="single-product">
                                        <div class="products-top">
                                            @if($product['price_sale'] == 0)
                                                <p class="price special-price">
                                                    <span class="price-new new2">{{number_format($product['price'])}} <span class="sub-money">{{$frontEndConfig['sub_money']}}</span></span>
                                                </p>
                                            @else
                                                <p class="price special-price non">
                                                    <span class="price-new">{{number_format($product['price_sale'])}} <span class="sub-money">{{$frontEndConfig['sub_money']}}</span></span>
                                                    <span class="price-old">{{number_format($product['price'])}} <span class="sub-money">{{$frontEndConfig['sub_money']}}</span></span>
                                                </p>
                                            @endif
                                            <div class="product-img">
                                                <a href="{{route('web.productDetail',$product['slug'])}}"
                                                   title="{{$product['title']}}">
                                                    <img class="primary-image" alt="{{$product['title']}}"
                                                         src="{{$product['avatar']}}">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="content-box again">
                                            <h2 class="name">
                                                <a href="{{route('web.productDetail',$product['slug'])}}"
                                                   title="{{$product['title']}}">
                                                    {{$product['title']}}
                                                </a>
                                            </h2>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section class="best-seller">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-5 col-xs-12">
                    <div class="title-group2">
                        <h2>Sản Phẩm Bán Chạy</h2>
                    </div>
                    <div class="single-slider indicator-style2">
                        @foreach($product_bestseller as $product)
                            <div class="single-product an-single">
                                <div class="products-top">
                                    @if($product->price_sale == 0)
                                        <p class="price special-price">
                                            <span class="price-new new2">{{number_format($product->price)}} <span class="sub-money">{{$frontEndConfig['sub_money']}}</span></span>
                                        </p>
                                    @else
                                        <p class="price special-price non">
                                            <span class="price-new">{{number_format($product->price_sale)}} <span class="sub-money">{{$frontEndConfig['sub_money']}}</span></span>
                                            <span class="price-old">{{number_format($product->price)}} <span class="sub-money">{{$frontEndConfig['sub_money']}}</span></span>
                                        </p>
                                    @endif
                                    <div class="product-img">
                                        <a href="{{route('web.productDetail',$product->slug)}}"
                                           title="{{$product->title}}">
                                            <img class="primary-image" alt="{{$product->title}}"
                                                 src="{{url($product->avatar)}}">
                                            @if(count($product->ProductMeta) > 0)
                                                @foreach($product->ProductMeta as $productmeta)
                                                    @if($productmeta->type == "img")
                                                        <img class="secondary-image" alt="{{$productmeta->key}}"
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
                        @endforeach
                    </div>
                </div>
                <div class="col-md-7 col-sm-7 col-xs-12">
                    <div class="title-group2">
                        <h2>Sản Phẩm Mới</h2>
                    </div>
                    <div class="row">
                        <div class="active-slider3 indicator-style2">
                            @foreach($product_new as $arr_product)
                                <div class="col-md-4">
                                    <div class="slider-one">
                                        @foreach($arr_product as $product)
                                            <div class="single-product">
                                                <div class="products-top">
                                                    @if($product['price_sale'] == 0)
                                                        <p class="price special-price">
                                                            <span class="price-new new2">{{number_format($product['price'])}} <span class="sub-money">{{$frontEndConfig['sub_money']}}</span></span>
                                                        </p>
                                                    @else
                                                        <p class="price special-price non">
                                                            <span class="price-new">{{number_format($product['price_sale'])}} <span class="sub-money"><span class="sub-money">{{$frontEndConfig['sub_money']}}</span></span></span>
                                                            <span class="price-old">{{number_format($product['price'])}} <span class="sub-money">{{$frontEndConfig['sub_money']}}</span></span>
                                                        </p>
                                                    @endif
                                                    <div class="product-img">
                                                        <a href="{{route('web.productDetail',$product['slug'])}}"
                                                           title="{{$product['title']}}">
                                                            <img class="primary-image" alt="{{$product['title']}}"
                                                                 src="{{$product['avatar']}}">
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="content-box again">
                                                    <h2 class="name">
                                                        <a href="{{route('web.productDetail',$product['slug'])}}"
                                                           title="{{$product['title']}}">
                                                            {{$product['title']}}
                                                        </a>
                                                    </h2>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="our-blog-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-group-parent">
                        <div class="title-group2">
                            <h2>Tin Tức</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="slider-active-five">
                    @foreach($blogs as $blog)
                        <div class="col-md-4">
                            <div class="item-inner">
                                <div class="articles-image">
                                    <a href="{{$blog->link}}" title="{{$blog->title}}">
                                        <img src="{{$blog->images}}" alt="{{$blog->title}}">
                                    </a>
                                </div>
                                <div class="articles-date">
                                    <a class="articles-name" href="{{$blog->link}}" title="{{$blog->title}}">
                                        {{$blog->title}}
                                    </a>
                                    <p>{{cut_string($blog->description,100)}} </p>
                                    <div class="readmore">
                                        <a href="{{$blog->link}}" title="{{$blog->title}}">Xem Thêm...</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@stop