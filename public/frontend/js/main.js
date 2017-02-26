(function ($) {
    "use strict";

    // tooltip
    $('.ratings a').tooltip();
    $('[data-toggle="tooltip"]').tooltip();
    /*----------------------------
     jQuery MeanMenu
     ------------------------------ */
    jQuery('nav#dropdown').meanmenu();
    /*----------------------------
     wow js active
     ------------------------------ */
    new WOW().init();

    /*----------------------------
     owl active
     ------------------------------ */
    $(".active-slider").owlCarousel({
        autoPlay: false,
        slideSpeed: 2000,
        pagination: false,
        navigation: true,
        items: 4,
        /* transitionStyle : "fade", */    /* [This code for animation ] */
        navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        itemsDesktop: [1199, 4],
        itemsDesktopSmall: [980, 3],
        itemsTablet: [768, 2],
        itemsMobile: [479, 1],
    });

    /*----------------------------
     owl active
     ------------------------------ */
    $(".single-slider").owlCarousel({
        autoPlay: false,
        slideSpeed: 2000,
        pagination: false,
        navigation: true,
        items: 1,
        /* transitionStyle : "fade", */    /* [This code for animation ] */
        navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        itemsDesktop: [1199, 1],
        itemsDesktopSmall: [980, 1],
        itemsTablet: [768, 1],
        itemsMobile: [479, 1],
    });


    /*----------------------------
     owl active
     ------------------------------ */
    $(".active-slider3").owlCarousel({
        autoPlay: false,
        slideSpeed: 2000,
        pagination: false,
        navigation: true,
        items: 3,
        /* transitionStyle : "fade", */    /* [This code for animation ] */
        navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        itemsDesktop: [1199, 3],
        itemsDesktopSmall: [980, 2],
        itemsTablet: [768, 2],
        itemsMobile: [479, 1],
    });

    /*----------------------------
     owl active
     ------------------------------ */
    $(".slider-active-five").owlCarousel({
        autoPlay: false,
        slideSpeed: 2000,
        pagination: false,
        navigation: false,
        items: 3,
        /* transitionStyle : "fade", */    /* [This code for animation ] */
        itemsDesktop: [1199, 3],
        itemsDesktopSmall: [980, 3],
        itemsTablet: [768, 2],
        itemsMobile: [479, 1],
    });

    /*----------------------------
     owl active
     ------------------------------ */
    $(".item_all").owlCarousel({
        autoPlay: false,
        slideSpeed: 2000,
        pagination: false,
        navigation: false,
        items: 5,
        /* transitionStyle : "fade", */    /* [This code for animation ] */
        itemsDesktop: [1199, 4],
        itemsDesktopSmall: [980, 3],
        itemsTablet: [768, 2],
        itemsMobile: [479, 1],
    });


    /*----------------------------
     owl active
     ------------------------------ */
    $(".slider7").owlCarousel({
        autoPlay: false,
        slideSpeed: 2000,
        pagination: false,
        navigation: true,
        items: 1,
        /* transitionStyle : "fade", */    /* [This code for animation ] */
        navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        itemsDesktop: [1199, 1],
        itemsDesktopSmall: [980, 1],
        itemsTablet: [768, 1],
        itemsMobile: [479, 1],
    });
    /*----------------------------
     owl active
     ------------------------------ */
    $(".active-slider8").owlCarousel({
        autoPlay: false,
        slideSpeed: 2000,
        pagination: false,
        navigation: true,
        items: 3,
        /* transitionStyle : "fade", */    /* [This code for animation ] */
        navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        itemsDesktop: [1199, 3],
        itemsDesktopSmall: [980, 2],
        itemsTablet: [768, 2],
        itemsMobile: [479, 1],
    });


    /*----------------------------
     owl active
     ------------------------------ */
    $(".active-slider9").owlCarousel({
        autoPlay: false,
        slideSpeed: 2000,
        pagination: false,
        navigation: true,
        items: 4,
        /* transitionStyle : "fade", */    /* [This code for animation ] */
        navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        itemsDesktop: [1199, 3],
        itemsDesktopSmall: [980, 2],
        itemsTablet: [768, 2],
        itemsMobile: [479, 1],
    });


    /*--
     Pro Slider for Pro Details
     ------------------------*/
    $(".pro-img-tab-slider").owlCarousel({
        items: 4,
        itemsDesktop: [1199, 4],
        itemsDesktopSmall: [768, 6],
        itemsTablet: [767, 5],
        itemsMobile: [479, 3],
        slideSpeed: 1500,
        paginationSpeed: 1500,
        rewindSpeed: 1500,
        navigation: true,
        navigationText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        pagination: false,
        addClassActive: true,
    });


    /*---------------------
     price slider
     --------------------- */

    $("#slider-range").slider({
        range: true,
        min: 40,
        max: 600,
        values: [60, 570],
        slide: function (event, ui) {
            $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
        }
    });
    $("#amount").val("$" + $("#slider-range").slider("values", 0) +
        " - $" + $("#slider-range").slider("values", 1));
    /*--
     Simple Lens and Lightbox
     ------------------------*/
    $('.simpleLens-lens-image').simpleLens({
        loading_image: 'frontend/lib/img/loading.gif'
    });
    /*--------------------------
     scrollUp
     ---------------------------- */
    $(window).on('scroll', function () {
        if ($(window).scrollTop() > 200) {
            $("#toTop").fadeIn();
        } else {
            $("#toTop").fadeOut();
        }
    });
    $("#toTop").on('click', function () {
        $("html,body").animate({
            scrollTop: 0
        }, 500)
    });
    /*----------------------------
     ajax add to cart
     ------------------------------ */
    $(document).ready(function () {
        $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
        $("#form_contact").validate({
            debug: true,
            errorElement: "span",
            rules: {
                fullname: "required",
                address: "required",
                phone: "required",
                email: {
                    required: true,
                    email: true
                },
                message: "required"
            },
            messages: {
                fullname: "Nhập họ tên của bạn !",
                address: "Nhập địa chỉ của bạn !",
                phone: "Nhập Số điện thoại của bạn !",
                email: {
                    required: "Nhập email của bạn !",
                    email: "Email không đúng định dạng"
                },
                message: "Nhập nội dung tin nhắn !"
            }, submitHandler: function (form) {
                // do other things for a valid form
                form.submit();
            }

        });

        $("#form_checkout").validate({
            debug: true,
            rules: {
                checkout_fullname: {required: true},
                checkout_email: {required: true, email: true},
                checkout_number_phone: {required: true},
                checkout_province: {required: true},
                checkout_district: {required: true},
                checkout_address: {required: true}
            },
            messages: {
                checkout_fullname: "Nhập họ tên của bạn !",
                checkout_email: {
                    required: "Nhập email của bạn !",
                    email: "Email không đúng định dạng"
                },
                checkout_number_phone: "Nhập Số điện thoại của bạn !",
                checkout_province: "Chọn Tỉnh/ Thành phố !",
                checkout_district: "Chọn Quận/ Huyện !",
                checkout_address: "Nhập địa chỉ của bạn !"
            },
            showErrors: function (errorMap, errorList) {
                $.each(this.validElements(), function (index, element) {
                    var $element = $(element);
                    $element.data("title", "")
                        .removeClass("error")
                        .tooltip("destroy");
                });
                $.each(errorList, function (index, error) {
                    var $element = $(error.element);
                    $element.tooltip("destroy")
                        .data("title", error.message)
                        .addClass("error")
                        .tooltip();
                });
            }, submitHandler: function (form) {
                form.submit();
            }
        });
        $("#checkout_province_select").on("change", function () {
            const url = $(this).attr("data-url");
            const data_token = $(this).attr("data-token");
            const province_id = $(this).val();
            $.ajax({
                type: "post",
                url: url,
                cache: false,
                data: {_token: data_token, province_id: province_id},
                dataType: 'json',
                success: function (data) {
                    if (data) {
                        var item = "<option value=''>Chọn Quận/ Huyện</option>";
                        $.each(data, function (index, value) {
                            item += '<option value="' + value.id + '">' + value.title + '</option>';
                        });
                        $("#checkout_district").html(item);
                    }
                }
            });

        });
        $("body").on("click", "#add_to_cart", function () {
            const url = $(this).attr("data-url");
            const qty = $("#cart_qty").val();
            const product_id = $("#product_id").val();
            const data_token = $("#data_token").val();
            $.ajax({
                type: "post",
                url: url,
                cache: false,
                data: {_token: data_token, data_qty: qty, product_id: product_id},
                dataType: 'json',
                beforeSend: function () {
                    $(".top-shop-title a span.count").html('<img src=\"frontend/lib/img/loading.gif\"/>');
                    $("#subtotal_cart").html('<img src=\"frontend/lib/img/loading.gif\"/>');
                },
                success: function (data) {
                    if (data.error) {
                        alert(data.error);
                    } else {
                        $(".top-shop-title a span.count").html(data.total_item);
                        $("#subtotal_cart").html('<p>Tổng tiền:<span>' + data.subtotal_cart + SUB_MONEY + '</span></p>');
                        $("." + data.rowid_item_cart).find("span#qty_cart").html(data.qty_item_cart);
                        $("#area_add_cart_item").html(data.item_cart);
                        var status = "";
                        status += '<div class="alert alert-success alert-dismissible" role="alert">';
                        status += '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                        status += '<strong></strong> ' + data.alert_cart + '';
                        status += '</div>';
                        $("#status_add_to_cart").html(status);
                        $('#status_cart_header').popover({
                            container: "body",
                            html: true,
                            placement: "bottom",
                            content: function () {
                                return '<div class="popover-message">' + $(this).data("message") + ' <a href="'+$(this).attr("data-url")+'" class="btn btn-success">Xem giỏ hàng và thanh toán</a></div>';
                            }
                        });
                        $('#status_cart_header').trigger("click");
                        $("html, body").animate({ scrollTop: $('body').offset().top }, 1000);

                    }
                }
            });
        });
        $("body").on("click", "#update_iem_cart", function () {
            const url = $(this).attr("data-url");
            const qty = $(this).parents(".aera-qty-cart").find("#qty_cart").val();
            const row_id = $(this).attr("data-cart-id");
            const data_token = $(this).attr("data-token");
            $.ajax({
                type: "post",
                url: url,
                cache: false,
                data: {_token: data_token, data_qty: qty, row_id: row_id},
                dataType: 'json',
                beforeSend: function () {
                    $(".top-shop-title a span.count").html('<img src=\"frontend/lib/img/loading.gif\"/>');
                    $("#subtotal_cart").html('<img src=\"frontend/lib/img/loading.gif\"/>');
                },
                success: function (data) {
                    if (data.error) {
                        alert(data.error);
                    } else {
                        $(".top-shop-title a span.count").html(data.total_item);
                        $("#subtotal_cart").html('<p>Tổng tiền:<span>' + data.subtotal_cart + SUB_MONEY + '</span></p>');
                        $(".only_subtotal_cart").html(data.subtotal_cart + SUB_MONEY);
                        $(".only_total_cart").html(data.total_cart + SUB_MONEY);
                        $("." + data.rowid_item_cart).find("#qty_cart").html(data.qty_item_cart);
                        $("#area_add_cart_item").html(data.item_cart);
                        $("." + data.rowid_item_cart).find("#total_item_cart").html(data.total_price_item_cart + SUB_MONEY);
                        if (data.total_item == 0) {
                            $(".shop-collaps-area").remove();
                            $(".shopping-cart-area .s-cart-all").html("<h5>Không có sản phẩm nào trong giỏ hàng của bạn.</h5>");
                        }
                    }
                }
            });
        });
        $("body").on("click", "#remove_item_cart", function () {
            const url = $(this).attr("data-url");
            const cart_id = $(this).attr("data-cart-id");
            const data_token = $(this).attr("data-token");
            const _ = $(this);
            $.ajax({
                type: "post",
                url: url,
                cache: false,
                data: {_token: data_token, rowId: cart_id},
                dataType: 'json',
                beforeSend: function () {
                    $(".top-shop-title a span.count").html('<img src=\"frontend/lib/img/loading.gif\"/>');
                    $("#subtotal_cart").html('<img src=\"frontend/lib/img/loading.gif\"/>');
                },
                success: function (data) {
                    if (data.error) {
                        alert(data.error);
                    } else {
                        $(".top-shop-title a span.count").html(data.total_item);
                        $("#subtotal_cart").html('<p>Tổng tiền:<span>' + data.subtotal_cart + SUB_MONEY + '</span></p>');
                        $("." + data.rowid_item_cart).remove();
                        $(".only_subtotal_cart").html(data.subtotal_cart + SUB_MONEY);
                        $(".only_total_cart").html(data.total_cart + SUB_MONEY);
                        if (data.total_item == 0) {
                            $(".shop-collaps-area").remove();
                            $(".shopping-cart-area .s-cart-all").html("<h5>Không có sản phẩm nào trong giỏ hàng của bạn.</h5>");
                        }
                    }
                }
            });
        });
    });
})(jQuery);