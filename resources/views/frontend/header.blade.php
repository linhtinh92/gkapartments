<header class="all-header">
    <div class="top_header">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="top_header_info">
                        <ul>
                            <li class="info_mail">
                                <span> Mail:</span>
                                {!! $frontEndConfig['email_receives_feedback'] or '' !!}
                            </li>
                            <li class="info_phone">
                                <span> Hotline:</span>
                                {!! $frontEndConfig['phone_number'] or '' !!}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bottom-header">
        <div class="header-inner">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="logo">
                            <a href="{{route('web.index')}}" title="{{$frontEndConfig['site_title'] or ''}}">
                                <img alt="" src="{{url('frontend')}}/img/logo/logo.png">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="menu-cart">
                            <div class="muti_menu">
                                <nav>
                                    <ul>
                                        {!! $mainMenu !!}
                                        <li><a href="{{route('web.contact')}}" title="Liên Hệ">Liên Hệ</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="top-cart-wrapper wrap">
                                <div class="top-shop-contain">
                                    <div class="block-shop">
                                        <div class="top-shop-title">
                                            <a href="javascript:void(0)" id="status_cart_header" rel="popover" data-message="Thêm vào giỏ hàng thành công !" data-url="{{route('web.cart')}}">
                                                <img alt="Giỏ Hàng"
                                                     src="{{url('frontend/img/shopping-cart/topcart.png')}}">
                                                <span class="count co1">{{Cart::count()}}</span>
                                            </a>
                                        </div>
                                        <div class="home">
                                            <div class="wish-cart margin">
                                                <div class="wish-item" id="area_add_cart_item">
                                                    @include('frontend.cart.itemcart')
                                                </div>
                                                <div class="wish-item">
                                                    <div class="cat_bottom">
                                                        <div class="cat_s" id="subtotal_cart">
                                                            <p>Tổng tiền:<span>{{Cart::subtotal()}} {{$frontEndConfig['sub_money']}}</span></p>
                                                        </div>
                                                        <div class="cat_d">
                                                            <a href="{{route('web.cart')}}" title="Giỏ Hàng"><strong>Xem Giỏ Hàng</strong></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="menu-search-top">
                            <div class="menu-search-mid">
                                <form action="{{route('web.timKiem')}}">
                                    <input class="menu-srch-all" type="text" placeholder="Tìm Kiếm" name="k" required
                                           value="{{isset($search) ? $search : ''}}">
                                    <span class="input-bun-top">
                                            <button class="menu-search" type="submit">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </span>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- mobile-menu-area start -->
<div class="mobile-menu-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="mobile-menu">
                    <nav id="dropdown">
                        <ul>
                            {!! $mainMenuMoblie !!}
                            <li><a href="{{route('web.contact')}}" title="Liên Hệ">Liên Hệ</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- mobile-menu-area end -->