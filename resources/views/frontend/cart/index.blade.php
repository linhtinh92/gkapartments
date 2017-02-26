@extends('frontend.master')
@section('content')
    <div class="top-contact">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li class="p-none">
                            <a href="{{route("web.index")}}">
                                <i class="fa fa-home"></i>
                            </a>
                        </li>
                        <li>
                            <a class="current" href="{{route("web.cart")}}">Giỏ Hàng</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- start shopping-cart-area
   ============================================ -->
    <div class="shopping-cart-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="s-cart-all">
                        @if(Cart::count() > 0)
                            <div class="page-title">
                                <h1>Giỏ Hàng</h1>
                            </div>
                            <div class="cart-form table-responsive ma">
                                <table id="shopping-cart-table" class="data-table cart-table">
                                    <tr>
                                        <th>Hình Ảnh</th>
                                        <th>Tên Sản Phẩm</th>
                                        <th>Số Lượng</th>
                                        <th>Đơn Giá</th>
                                        <th>Thành Tiền</th>
                                    </tr>
                                    @foreach(Cart::content() as $row)
                                        <tr class="{{$row->rowId}}">
                                            <td class="sop-cart">
                                                <a href="{{route("web.productDetail",$row->options->has('slug') ? $row->options->slug : '')}}"
                                                   title="{{$row->name}}" id="img_cart">
                                                    <img src="{{url($row->options->has('avatar') ? $row->options->avatar : '')}}"
                                                         alt="{{$row->name}}">
                                                </a>
                                            </td>
                                            <td class="sop-cart">
                                                <a href="{{route("web.productDetail",$row->options->has('slug') ? $row->options->slug : '')}}"
                                                   title="{{$row->name}}">
                                                    {{$row->name}}
                                                </a>
                                            </td>
                                            <td class="cen aera-qty-cart">
                                                <input class="input-text qty" type="text" name="qty" maxlength="12"
                                                       value="{{$row->qty}}" title="Qty" id="qty_cart">
                                                <div class="tas ce-ta">
                                                    <a class="add" title="" data-toggle="tooltip"
                                                       href="javascript:void(0)"
                                                       data-original-title="Cập Nhật" id="update_iem_cart"
                                                       data-cart-id="{{$row->rowId}}"
                                                       data-token="{{csrf_token()}}"
                                                       data-url="{{route("web.updateCart")}}">
                                                        <i class="fa fa-refresh"></i>
                                                    </a>
                                                </div>
                                            </td>
                                            <td class="sop-cart">{{number_format($row->price)}} {{$frontEndConfig['sub_money']}}</td>
                                            <td class="sop-cart">
                                                <span id="total_item_cart">{{number_format($row->price *$row->qty)}} {{$frontEndConfig['sub_money']}}</span>
                                                <span class="remove-item-cart"><br><a id="remove_item_cart"
                                                                                      data-cart-id="{{$row->rowId}}"
                                                                                      data-token="{{csrf_token()}}"
                                                                                      data-url="{{route("web.removeItemCart")}}"
                                                                                      href="javascript:void(0)">Bỏ Chọn</a></span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        @else
                            <h5>Không có sản phẩm nào trong giỏ hàng của bạn.</h5>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end shopping-cart-area
    ============================================ -->
    @if(Cart::count() > 0)
        <section class="shop-collaps-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12">

                    </div>
                    <div class="col-md-6 col-sm-12  col-xs-12">
                        <table class="table table-bordered">
                            <tr>
                                <td class="text-center">
                                    <strong>Tạm Tính:</strong>
                                </td>
                                <td class="text-center only_subtotal_cart">{{Cart::subtotal()}} {{$frontEndConfig['sub_money']}}</td>
                            </tr>
                            <tr>
                                <td class="text-center">
                                    <strong>Tổng Tiền:</strong>
                                </td>
                                <td class="text-center only_total_cart">{{Cart::total()}} {{$frontEndConfig['sub_money']}}</td>
                            </tr>
                        </table>
                        <div class="buttons">
                            <a href="{{route('web.checkout')}}">
                                <div class="pull-right no9">
                                    <button class="button bn7">
                                    <span>
                                        <span>Thanh Toán</span>
                                    </span>
                                    </button>
                                </div>
                            </a>
                        </div>
                        <div class="buttons">
                            <a href="{{route('web.index')}}">
                                <div class="pull-right no9">
                                    <button class="button bn7">
                                    <span>
                                        <span>Tiếp tục mua hàng</span>
                                    </span>
                                    </button>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@stop