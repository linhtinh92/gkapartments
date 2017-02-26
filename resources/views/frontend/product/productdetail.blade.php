@extends('frontend.master')
@section('content')
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
                        <li class="p-none si-no">
                            <a href="{{route('web.category',$product->category->slug)}}"
                               title="{{$product->category->title}}">{{$product->category->title}}</a>
                        </li>
                        <li>
                            <a class="current" href="{{route('web.productDetail',$product->slug)}}"
                               title="{{$product->title}}">{{$product->title}}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="single-product-area sit product-view">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6 none-si-pro">
                    <div class="pro-img-tab-content tab-content">
                        <div class="tab-pane active" id="image-main-{{$product->id}}">
                            <div class="simpleLens-big-image-container">
                                <a class="simpleLens-lens-image" data-lightbox="roadtrip"
                                   data-lens-image="{!! url($product->avatar)!!}" href="{!! url($product->avatar)!!}">
                                    <img src="{!! url($product->avatar)!!}" alt="{{$product->title}}"
                                         class="simpleLens-big-image">
                                </a>
                            </div>
                        </div>
                        @if(count($product->ProductMeta) > 0)
                            @foreach($product->ProductMeta as $productmeta)
                                @if($productmeta->type == "img")
                                    <div class="tab-pane" id="image-sub-{{$productmeta->id}}">
                                        <div class="simpleLens-big-image-container">
                                            <a class="simpleLens-lens-image" data-lightbox="roadtrip"
                                               data-lens-image="{{url($productmeta->value)}}"
                                               href="{{url($productmeta->value)}}">
                                                <img src="{{url($productmeta->value)}}" alt="{{$productmeta->key}}"
                                                     class="simpleLens-big-image">
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                    </div>
                    <div class="pro-img-tab-slider indicator-style2">
                        <div class="item">
                            <a href="#image-main-{{$product->id}}" data-toggle="tab">
                                <img src="{!! url($product->avatar)!!}" alt="{{ $product->title}}"/>
                            </a>
                        </div>
                        @if(count($product->ProductMeta) > 0)
                            @foreach($product->ProductMeta as $productmeta)
                                @if($productmeta->type == "img")
                                    <div class="item"><a href="#image-sub-{{$productmeta->id}}" data-toggle="tab">
                                            <img src="{{url($productmeta->value)}}" alt="{{$productmeta->key}}"/></a>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-md-5 col-sm-6">
                    <div id="status_add_to_cart">

                    </div>
                    <div class="cras">
                        <div class="product-name">
                            <h2>{{ $product->title}}</h2>
                        </div>
                        @if(count($product->ProductMeta) > 0)
                            @foreach($product->ProductMeta as $productmeta)
                                @if($productmeta->type == "text")
                                    <p class="availability in-stock">
                                        {{$productmeta->key}}: {{$productmeta->value}}
                                    </p>
                                @endif
                            @endforeach
                        @endif
                        <div class="short-description">
                            <p>{!! $product->description !!}</p>
                        </div>
                        @if($product->price_sale == 0)
                            <div class="pre-box">
                                <span class="special-price">{{number_format($product->price)}} {{$frontEndConfig['sub_money']}}</span>
                            </div>
                        @else
                            <div class="price">
                                {{number_format($product->price_sale)}} {{$frontEndConfig['sub_money']}}
                                <span class="price-old" style="text-decoration: line-through;">
                                    {{number_format($product->price)}} {{$frontEndConfig['sub_money']}}
                                </span>
                            </div>
                        @endif

                        <div class="add-to-box1">
                            <div class="add-to-box add-to-box2">
                                <div class="add-to-cart">
                                    <div class="input-content">
                                        <label for="qty">Quantity:</label>
                                        <input id="cart_qty" class="input-text qty" type="text" name="qty" maxlength="12"
                                               value="1" title="Qty">
                                        <input id="product_id" value="{{$product->id}}" type="hidden">
                                        <input id="data_token" value="{{csrf_token()}}" type="hidden">
                                    </div>
                                    <div class="product-icon">
                                        <a href="javascript:void(0)" id="add_to_cart" data-url="{{route('web.addToCart')}}">
                                            MUA NGAY <i class="fa fa-shopping-cart"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="s-cart-img">
                            <a href="#">
                                <img alt="" src="{{url("frontend")}}/img/shopping-cart/Screenshot_2.png">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12">
                    <div class="related-title s-title">
                        <h2>
                            <span>Related</span>
                        </h2>
                    </div>
                    <div class="slider7 s-slider7 indicator-style2">
                        @foreach($relatedProduct as $arr_product)
                            <div class="ma-box-content-all">
                                @foreach($arr_product as $pro)
                                    <div class="ma-box-content clearfix">
                                        <div class="product-img-right">
                                            <a href="{{route('web.productDetail',$pro['slug'])}}"
                                               title="{{$pro['title']}}">
                                                <img class="primary-image" alt="{{$pro['title']}}"
                                                     src="{{$pro['avatar']}}">
                                            </a>
                                        </div>
                                        <div class="product-content">
                                            <h2 class="product-name">
                                                <a href="{{route('web.productDetail',$pro['slug'])}}"
                                                   title="{{$pro['title']}}">
                                                    {{$pro['title']}}
                                                </a>
                                            </h2>
                                            @if($pro['price_sale'] == 0)
                                                <div class="price-box h2">
                                                    <span class="special-price">{{number_format($pro['price'])}} {{$frontEndConfig['sub_money']}}</span>
                                                </div>
                                            @else
                                                <div class="price-box h2">
                                                    <span class="special-price">{{number_format($pro['price_sale'])}} {{$frontEndConfig['sub_money']}}</span>
                                                    <span class="old-price">{{number_format($pro['price'])}} {{$frontEndConfig['sub_money']}} </span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="tab_area sing-tab">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="text">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#home" aria-controls="home" role="tab" data-toggle="tab">Product
                                    Description</a>
                            </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="home">
                                {!! $product->content or "" !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop