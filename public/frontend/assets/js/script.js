/**
 * Created by thanh on 4/3/2017.
 */
$(document).ready(function () {

    (function ($) {

        $('#header__icon').click(function (e) {
            e.preventDefault();
            $('body').toggleClass('with--sidebar');
        });

        $('#site-cache').click(function (e) {
            $('body').removeClass('with--sidebar');
        });

    })(jQuery);

    $('body').on('click', '.menu-mobile-active', function () {
        var parent = $(this).parent('.sub-menu-apartment');
        if (parent.hasClass('menu-active')) {
            parent.removeClass('menu-active');
        } else {
            parent.addClass('menu-active');
        }
    });
    $(window).scroll(function (event) {
        var scroll = $(window).scrollTop();
        if (scroll > 70) {
            $(".header").addClass("scroll");
        } else {
            $(".header").removeClass("scroll");
        }
    });
    $(window).load(function () {
        $('.nivoSlider').nivoSlider({
            effect: 'random', // Specify sets like: 'fold,fade,sliceDown'
            slices: 15, // For slice animations
            boxCols: 8, // For box animations
            boxRows: 4, // For box animations
            animSpeed: 1000, // Slide transition speed
            pauseTime: 5000, // How long each slide will show
            startSlide: 0, // Set starting Slide (0 index)
            directionNav: false, // Next & Prev navigation
            controlNav: true, // 1,2,3... navigation
            controlNavThumbs: false, // Use thumbnails for Control Nav
            pauseOnHover: true, // Stop animation while hovering
            manualAdvance: false, // Force manual transitions
            prevText: 'Prev', // Prev directionNav text
            nextText: 'Next', // Next directionNav text
            randomStart: false, // Start on a random slide
            beforeChange: function () {
            }, // Triggers before a slide transition
            afterChange: function () {
            }, // Triggers after a slide transition
            slideshowEnd: function () {
            }, // Triggers after all slides have been shown
            lastSlide: function () {
            }, // Triggers when last slide is shown
            afterLoad: function () {
            } // Triggers when slider has loaded
        })
    });

    new WOW().init();
});