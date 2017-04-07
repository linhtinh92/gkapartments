@extends('frontend.master')
@section('content')
    <section class="box-slider">
        <div class="row">
            <div class="banner-home-page">
                <div class="nivoSlider">
                    <img src="{{url('public/frontend/assets/images/banner.jpg')}}" alt="" class="img-responsive" title="This is an example of a caption"/>
                </div>
            </div>
        </div>
    </section>

    <section class="container">
        <div class="row">
            <div class="col-xs-12 information-gkhome ">
                <h1 class="title-company">GK HOME</h1>
                <div class="box-infor-gkhome col-sm-offset-2 col-sm-8 col-xs-offset-0 col-xs-12 wow fadeInLeft" data-wow-offset="200">
                    <div class="title-current-infor">
                        <div class="line-current-title"></div>
                        <h2 class="current-title">About us</h2>
                    </div>
                    <div class="content-current-infor">
                        GK-HOME is the very first project of convenient serviced apartment project of Gia Khang group.
                        GK-Home is located in district 1 or Central Business District of Ho Chi Minh city where the
                        shopping center, entertainment activities and Famous Visiting destination for tourist are
                        located nearby. It is only 5 minutes motorbike driving to biggest backpacker area in HCMC,
                        less than 10 minutes to Ben Thanh central market and only 9 km from Tan Son Nhat International
                        Airport.
                    </div>
                </div>
                <div class="box-infor-gkhome col-sm-offset-2 col-sm-8 col-xs-offset-0 col-xs-12 wow fadeInLeft" data-wow-offset="300">
                    <div class="title-current-infor">
                        <div class="line-current-title"></div>
                        <h2 class="current-title">Our Mission</h2>
                    </div>
                    <div class="content-current-infor">
                        Our mission is to create the most convenient and comfortable apartment where you can feel as
                        if staying in your own house. With GK-Home your staying will be more completed.
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="container-fluid">
        <div class="row">
            <div class="col-sm-4 col-xs-12 sample-design-gkhome wow bounceInLeft" data-wow-offset="300">
                <div class="text-center">
                    <img src="{{url('public/frontend/assets/images/design1.jpg')}}" alt="" class="img-responsive dis-inline-block">
                    <div class="title-sample-design-gkhome">GK Home</div>
                </div>
            </div>
            <div class="col-sm-4 col-xs-12 sample-design-gkhome wow fadeInLeft" data-wow-offset="300">
                <div class="text-center">
                    <img src="{{url('public/frontend/assets/images/design3.jpg')}}" alt="" class="img-responsive dis-inline-block">
                    <div class="title-sample-design-gkhome">GK Unit</div>
                </div>
            </div>
            <div class="col-sm-4 col-xs-12 sample-design-gkhome wow bounceInLeft" data-wow-offset="300">
                <div class="text-center">
                    <img src="{{url('public/frontend/assets/images/design3.jpg')}}" alt="" class="img-responsive dis-inline-block">
                    <div class="title-sample-design-gkhome">GK Garden</div>
                </div>
            </div>
        </div>
    </section>

    <section class="container">
        <div class="row">
            <div class="col-xs-12 information-gkhome">
                <h1 class="title-company">GK HOME</h1>
                <div class="box-infor-gkhome col-sm-offset-2 col-sm-8 col-xs-offset-0 col-xs-12">
                    <div class="title-current-infor">
                        <div class="line-current-title"></div>
                        <h2 class="current-title">Promotions</h2>
                    </div>
                    <div class="content-current-infor">
                        GK-HOME is the very first project of convenient serviced apartment
                        project of Gia Khang group. GK-Home is located in district 1 or Central
                        Business District of Ho Chi Minh city where the shopping center, entertainment
                        activities and Famous Visiting destination for tourist are located nearby.
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop