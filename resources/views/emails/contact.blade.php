<div align="center">
    <p>Cảm ơn bạn đã để lại lời nhắn. Chúng tôi sẻ liên hệ lại cho bạn sớm nhất !</p>
    <table cellpadding="0" cellspacing="0" style="min-width: 400px">
        <tr bgcolor="#fff8dc">
            <td colspan="2" style="padding:5px; text-align:center; text-transform:uppercase"> Contact Us</td>
        </tr>
        <tr style="background:#eee">
            <td style="padding:5px">Họ Tên:</td>
            <td style="padding:5px">{{$data->name}}</td>
        </tr>
        <tr style="background:#ccc">
            <td style="padding:5px">Email :</td>
            <td style="padding:5px">{{$data->email}}</td>
        </tr>
        <tr style="background:#eee">
            <td style="padding:5px">Số điện thoại :</td>
            <td style="padding:5px">{{$data->phone}}</td>
        </tr>
        <tr style="background:#ccc">
            <td style="padding:5px">Tin nhắn:</td>
            <td style="padding:5px">{{$data->message}}</td>
        </tr>
    </table>
    <p><i>Email was sent from {{$_SERVER['SERVER_NAME']}}</i></p>
</div>
