/**
 * Created by thanh on 4/3/2017.
 */
$(document).ready(function(){

    (function($) {

        $('#header__icon').click(function(e){
            e.preventDefault();
            $('body').toggleClass('with--sidebar');
        });

        $('#site-cache').click(function(e){
            $('body').removeClass('with--sidebar');
        });

    })(jQuery);

    $('body').on('click','.menu-mobile-active', function () {
        var parent =  $(this).parent('.sub-menu-apartment');
        if(parent.hasClass('menu-active')) {
            parent.removeClass('menu-active');
        } else {
            parent.addClass('menu-active');
        }
    })

    $(".owl-carousel").owlCarousel({
        loop:true,
        margin:15,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
                nav:true
            },
            480:{
                items:2,
                nav:true
            },
            768:{
                items:4,
                nav:true
            },
            992:{
                items:5,
                nav:true
            },
            1024:{
                items:6,
                nav:true,
                loop:false
            }
        }
    });
});