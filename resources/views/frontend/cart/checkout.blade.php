@extends('frontend.master')
@section('content')
    <!-- mobile-menu-area end -->
    <div class="top-contact">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li class="p-none">
                            <a href="#">
                                <i class="fa fa-home"></i>
                            </a>
                        </li>
                        <li>
                            <a class="current" href="">Thanh Toán</a>
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
                        <h1>Thanh Toán</h1>
                    </div>
                    <form id="form_checkout" action="" method="POST">
                        {{csrf_field()}}
                        @include('flash::message')
                        <div class="row">
                            <div class="billing-info">
                                <div class="input-one form-list col-sm-6">
                                    <label class="required">
                                        Họ Tên
                                        <em>*</em>
                                    </label>
                                    <input class="checkout" type="text" required="" name="checkout_fullname">
                                </div>
                                <div class="input-one form-list col-sm-6">
                                    <label class="required">
                                        Công Ty
                                    </label>
                                    <input class="checkout" type="text" name="checkout_company_name">
                                </div>
                                <div class="input-one form-list col-sm-6">
                                    <label class="required">
                                        Email
                                        <em>*</em>
                                    </label>
                                    <input class="checkout" type="email" required="" name="checkout_email">
                                </div>
                                <div class="input-one form-list col-sm-6">
                                    <label class="required">
                                        Điện thoại di động
                                        <em>*</em>
                                    </label>
                                    <input class="checkout" type="text" required="" name="checkout_number_phone">
                                </div>
                                <div class="input-one form-listcol col-sm-6">
                                    <label class="required req2">
                                        Tỉnh/Thành phố
                                        <em>*</em>
                                    </label>
                                    <select class="checkout s-email" name="checkout_province" required id="checkout_province_select"
                                            data-url="{{route('web.postDistrict')}}" data-token="{{csrf_token()}}">
                                        <option value="">Chọn Tỉnh/Thành phố</option>
                                        @foreach($provinces as $province)
                                            <option value="{{$province->id}}">{{$province->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-one form-listcol col-sm-6">
                                    <label class="required req2">
                                        Quận/Huyện
                                        <em>*</em>
                                    </label>
                                    <select class="checkout s-email" id="checkout_district" name="checkout_district" required>
                                        <option value="">Chọn Quận/Huyện</option>
                                    </select>
                                </div>
                                <div class="input-one form-list col-sm-6">
                                    <label class="required">
                                        Địa chỉ
                                        <em>*</em>
                                    </label>
                                    <input class="checkout" name="checkout_address" type="text" required>
                                </div>
                                <div class="input-one form-list col-sm-6">
                                    <label class="required">
                                        Ghi chú
                                    </label>
                                    <textarea class="form-control" name="checkout_note"></textarea>
                                </div>
                                <div class="block-button-right clearfix">
                                    <div class="col-md-12">
                                        <a class="o-back-to" href="{{route('web.cart')}}">
                                            <i class="fa fa-arrow-left"></i>
                                            Giỏ Hàng
                                        </a>

                                        <button class="button2 get" type="submit" title="">
                                            <span>Hoàn Tất</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@stop