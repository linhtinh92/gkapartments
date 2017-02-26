<table width="100%" border="0" cellspacing="0" cellpadding="0">

    <tbody>

    <tr>
        <td bgcolor="#e42a2a" style="border-top:#b62424 2px solid">
            <table width="700" border="0" cellspacing="0" cellpadding="0" align="center"
                   style="border-top:#e42a2a 10px solid;border-bottom:#e42a2a 10px solid">
                <tbody>
                <tr>
                    <td>
                        <h1 style="font-family:tahoma;color:#ffffff;font-size:24px">Thông Tin Thanh Toán<br><span
                                    style="font-size:18px">Mã đơn hàng:&nbsp; {{$data->code}}</span></h1>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>

    <tr>
        <td bgcolor="#efefef">
            <table width="800" border="0" cellspacing="0" cellpadding="0" align="center"
                   style="border-bottom:20px solid #efefef">
                <tbody>
                <tr>
                    <td height="18" valign="top" style="border-bottom:20px #efefef solid">
                        <p style="font-family:tahoma;font-size:14px;font-weight:700;color:#363636">Kính
                            gửi {{$data->fullname}}</p>
                        <p style="font-family:tahoma;font-size:12px;color:#363636;line-height:18px">
                            Chúng tôi đã nhận được đơn đặt hàng của quý khách và đang trong quá trình xử lý.
                        </p>
                        <p style="font-family:tahoma;font-size:12px;color:#363636;line-height:18px">
                            Bên dưới là thông tin chi tiết đơn đặt hàng của quý khách:
                        </p>
                        <p style="font-family:tahoma;font-size:12px;color:#363636;line-height:18px">
                            Số đơn đặt hàng: <b>{{$data->code}}</b>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td height="18" valign="top" bgcolor="#FFFFFF"
                        style="border-bottom:20px #ffffff solid;border-top:20px #ffffff solid;border-left:20px #ffffff solid;border-right:20px #ffffff solid;background:#ffffff">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0"
                               style="border-bottom:#d8d8d8 1px solid">
                            <tbody>
                            <tr bgcolor="#646464">
                                <td width="40%" height="50">
                                    <div align="left" style="font-family:tahoma;font-size:12px;color:#ffffff">
                                        Tên Sản Phẩm
                                    </div>
                                </td>
                                <td width="20%" height="50" style="border-left:#939393 1px solid;line-height:18px">
                                    <div align="center" style="font-family:tahoma;font-size:12px;color:#ffffff">
                                        Giá
                                    </div>
                                </td>
                                <td width="20%" height="50" style="border-left:#939393 1px solid">
                                    <div align="center" style="font-family:tahoma;font-size:12px;color:#ffffff">
                                        Số Lượng
                                    </div>
                                </td>
                                <td width="20%" height="50">
                                    <div align="right" style="font-family:tahoma;font-size:12px;color:#ffffff">
                                        Thành Tiền
                                    </div>
                                </td>
                            </tr>
                            @if($data->getShopCart)
                                @foreach($data->getShopCart as $cart)
                                    <tr bgcolor="#ffffff">
                                        <td>
                                            <div align="left" style="font-family:tahoma;font-size:12px;color:#363636">
                                                {{$cart->product_name}}
                                            </div>
                                        </td>
                                        <td height="40" style="border-left:#cecece 1px solid">
                                            <div align="center" style="font-family:tahoma;font-size:12px;color:#363636">
                                                {{number_format($cart->product_price)}} VND
                                            </div>
                                        </td>
                                        <td height="40" style="border-left:#cecece 1px solid">
                                            <div align="center"
                                                 style="font-family:tahoma;font-size:12px;color:#363636">
                                                {{$cart->product_qty}}
                                            </div>
                                        </td>
                                        <td height="40" style="border-left:#cecece 1px solid">
                                            <div align="right" style="font-family:tahoma;font-size:12px;color:#363636">
                                                {{number_format($cart->product_qty*$cart->product_price)}} VND
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            <tr bgcolor="#f6f6f6">
                                <td height="40" colspan="3">
                                    <div align="right"
                                         style="font-family:tahoma;font-size:12px;color:#363636;padding-right:10px">Tạm Tính &nbsp;&nbsp;</div>
                                </td>
                                <td height="40" style="border-left:#cecece 1px solid">
                                    <div align="right"
                                         style="font-family:tahoma;font-size:12px;color:#363636;padding-right:5px">
                                        {{$data->subtotal}} VND&nbsp;&nbsp;</div>
                                </td>
                            </tr>
                            <tr bgcolor="#ffffff">
                                <td height="40" colspan="3">
                                    <div align="right"
                                         style="font-family:tahoma;font-size:12px;color:#363636;padding-right:10px">Tổng
                                        cộng&nbsp;&nbsp;&nbsp;&nbsp;</div>
                                </td>
                                <td height="40" style="border-left:#cecece 1px solid">
                                    <div align="right"
                                         style="font-family:tahoma;font-size:12px;color:#ff6000;font-weight:bold">
                                        <strong><span class="m_-6249398321130863268new-price"><b
                                                        class="m_-6249398321130863268red">{{$data->total}} VND</b></span></strong>
                                        &nbsp;&nbsp;</div>
                                </td>
                            </tr>


                            </tbody>
                        </table>
                        <br>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>

    </tbody>
</table>