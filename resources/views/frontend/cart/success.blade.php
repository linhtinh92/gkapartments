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
                            <a class="current" href="">Đặt Hàng Thành Công</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- end header_area
    ============================================ -->
    <section class="collapse_area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="check">
                        <h1>Đặt Hàng Thành Công</h1>
                    </div>
                    <div class="content-order">
                        <span class="ic-check"></span>
                        <p>Chào <strong><span class="yel">{{$checkout['fullname']}},</span></strong></p>
                        <p>Quý khách vừa đặt hàng thành công, mã đơn hàng của quý khách là: <strong><span
                                            class="yel">{{$checkout['code']}}</span></strong>.
                        </p>
                        <p>Mọi thông tin về đơn hàng sẽ được gửi tới email của quý khách, vui lòng kiểm tra email để
                            biết thêm chi tiết.</p>
                        <br>
                        <br>
                        <p>Cảm ơn quý khách đã mua hàng tại <a title="{{$_SERVER['SERVER_NAME']}}"
                                                                             href="http://{{$_SERVER['SERVER_NAME']}}"><span
                                        class="red">{{$_SERVER['SERVER_NAME']}}</span></a></p>
                        <div class="contact-info">
                            <div>Mọi thắc mắc vui lòng liên hệ: <strong>{!! $frontEndConfig['phone_number'] or '' !!}</strong></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop