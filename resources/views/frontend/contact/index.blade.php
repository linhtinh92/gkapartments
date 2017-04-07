@extends('frontend.master')
@section('content')
    <div class="box-main-content">
            <div class="main-about-us">
                <div class="title-about-us">Contact us</div>
                <div class="infor-main-content">
                    <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                        <div class="infor-company">
                            <p>
                                <strong>GK Home</strong>
                            </p>
                            <p>
                                <strong>Address: </strong>28 Nguyen Van Cu, Cau Kho Ward, Dist 1, Ho Chi Minh City
                            </p>
                            <p>
                                <strong>Email: </strong>sales@gkhome.com.vn
                            </p>
                            <p>
                                <strong>Tel: </strong>(08) 392 090 25
                            </p>
                            <p>
                                <strong>HP: </strong>0906 837 828  for further information
                            </p>
                            <p>
                                <strong>Website: </strong>www.gkhome.com.vn
                            </p>
                        </div>
                        <div class="maps-company">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.7254119362765!2d106.68382391390064!3d10.75563296252041!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f0517233201%3A0x9a1a2d5402267026!2sGK-HOME+SERVICED+APARTMENT!5e0!3m2!1svi!2s!4v1491500204054" width="550" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                        <div class="col-xs-12 form-contact ">
                            <div class="title-contact">Contact us</div>
                            <div class="form-contact-us">
                                <form action="">
                                    <p>Fields marked with * are required</p>
                                    <div class="form-group">
                                        <div class="text-left">
                                            <label for="name">Name *</label>
                                        </div>
                                        <div class="width-input-textarea">
                                            <input type="text" class="form-control" id="name">
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="form-group">
                                        <div class="text-left">
                                            <label for="email">Email *</label>
                                        </div>
                                        <div class="width-input-textarea">
                                            <input type="email" class="form-control" id="email">
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="form-group">
                                        <div class="text-left">
                                            <label for="phone">Mobile</label>
                                        </div>
                                        <div class="width-input-textarea">
                                            <input type="number" class="form-control" id="phone">
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="form-group">
                                        <div class="text-left">
                                            <label for="message">Message *</label>
                                        </div>
                                        <div class="width-input-textarea">
                                            <textarea name="" id="message" cols="30" rows="5"></textarea>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn-reset btn btn-default pull-right">Reset</button>
                                        <button type="submit" class="btn-send btn btn-default pull-right">Send</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
@stop