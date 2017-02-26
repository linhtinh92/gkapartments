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
                            <a class="current" href="{{route('web.contact')}}">Liên Hệ</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="top-map-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="map-area">
                        <div class="contact-map">
                            <div id="hastech">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div>
                                <h3>Địa chỉ của chúng tôi</h3>
                            </div>
                            <div class="panel-body">
                                <ul class="info-contact">
                                    <li><h1>{!! $frontEndConfig['company_name'] or '' !!}</h1></li>
                                    <li>
                                        <strong>Địa Chỉ</strong>: {!! $frontEndConfig['address'] or '' !!}
                                    </li>
                                    <li>
                                        <strong>Điện Thoại :</strong>
                                        {!! $frontEndConfig['phone_number'] or '' !!}
                                    </li>
                                    <li>
                                        <strong>Email:</strong>
                                        <a href="mailto:{!! $frontEndConfig['email_receives_feedback'] or '' !!}">
                                            {!! $frontEndConfig['email_receives_feedback'] or '' !!}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6 form-contact">
                            <h3>&nbsp;</h3>
                            <form class="cendo" method="post" id="form_contact" action="{{route('web.postcontact')}}">
                                {{csrf_field()}}
                                @include('flash::message')
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Họ Tên</label>
                                    <input type="text" class="form-control" id=""
                                           placeholder="Họ Tên " required name="fullname">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Địa Chỉ</label>
                                    <input type="text" class="form-control" id=""
                                           placeholder="Địa chỉ" required name="address">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Email</label>
                                    <input type="email" class="form-control" id=""
                                           placeholder="Email" required name="email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số Điện Thoại</label>
                                    <input type="text" class="form-control" id=""
                                           placeholder="Số Điện Thoại" name="phone">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tin Nhắn</label>
                                    <textarea class="form-control" rows="3" name="message"></textarea>
                                </div>
                                <div class="col-md-12">
                                    <div class="buttons">
                                        <div class="pull-right">
                                            <input class="btn btn-primary" type="submit" value="Submit">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- google map api
		============================================ -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDZdWwAbB1RF-iJYffDvb1nD6GAu5S6Jpg&callback=initMap"></script>
    <script>
        var myCenter = new google.maps.LatLng('{!! $frontEndConfig['longitude'] or '' !!}','{!! $frontEndConfig['latitude'] or '' !!}');
        function initialize() {
            var mapProp = {
                center: myCenter,
                scrollwheel: false,
                zoom: 17,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var map = new google.maps.Map(document.getElementById("hastech"), mapProp);
            var marker = new google.maps.Marker({
                position: myCenter,
                animation: google.maps.Animation.BOUNCE,
                icon: 'frontend/img/map-marker.png',
                map: map,
            });

            marker.setMap(map);
        }
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
@stop