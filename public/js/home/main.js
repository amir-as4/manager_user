$(document).ready(function () {
    //Init the carousel
    $("#suggestion-slider").owlCarousel({
        rtl: true,
        items: 1,
        autoplay: true,
        autoplayTimeout: 5000,
        loop: true,
        dots: false,
        onInitialized: startProgressBar,
        onTranslate: resetProgressBar,
        onTranslated: startProgressBar
    });



    $(".product-carousel").owlCarousel({
        rtl: true,
        items: 3,
        loop: true,
        dots: false,
        nav:true,
        navText: ['<i class="now-ui-icons arrows-1_minimal-right"></i>', '<i class="now-ui-icons arrows-1_minimal-left"></i>'],
    });

    function startProgressBar() {
      // apply keyframe animation
      $(".slide-progress").css({
        width: "100%",
        transition: "width 5000ms"
      });
    }

    function resetProgressBar() {
      $(".slide-progress").css({
        width: 0,
        transition: "width 0s"
      });
    }

    // **************  product slider
    $(".product-carousel-indicators").owlCarousel({
        rtl: true,
        margin: 10,
        nav: true,
        navText: ['<i class="now-ui-icons arrows-1_minimal-right"></i>', '<i class="now-ui-icons arrows-1_minimal-left"></i>'],
        dots: false,
        responsiveClass: true,
        responsive: {
            0: {
                items: 2,
                slideBy: 1
            },
            576: {
                items: 2,
                slideBy: 1
            },
            768: {
                items: 3,
                slideBy: 2
            },
            992: {
                items: 3,
                slideBy: 2
            },
            1400: {
                items: 4,
                slideBy: 3
            }
        }
    });


    $('.brand-slider .owl-carousel').owlCarousel({
        rtl: true,
        margin: 10,
        items: 5,
        nav: true,
        navText: ['<i class="now-ui-icons arrows-1_minimal-right"></i>', '<i class="now-ui-icons arrows-1_minimal-left"></i>'],
        responsive: {
            0: {
                items: 1
            },
            576: {
                items: 4
            },
            768: {
                items: 5
            },
            992: {
                items: 5
            }
        }
    });

    $('.back-to-top').click(function (e) {
        e.preventDefault();
        $('html, body').animate({ scrollTop: 0 }, 800, 'easeInExpo');
    });

    if ($("#img-product-zoom").length) {
        $("#img-product-zoom").ezPlus({
            zoomType: "inner",
            containLensZoom: true,
            gallery: 'gallery_01f',
            cursor: "crosshair",
            galleryActiveClass: "active",
            responsive: true,
            imageCrossfade: true,
            zoomWindowFadeIn: 500,
            zoomWindowFadeOut: 500
        });
    }

    $(".sum-more").click(function () {
        var sumaryBox = $(this).parents('.parent-expert');
        sumaryBox.find('.content-expert').toggleClass('active');
        sumaryBox.find('.shadow-box').fadeToggle();

        $(this).find('i').toggleClass('active');

        $(this).find('.show-more').fadeToggle(0);
        $(this).find('.show-less').fadeToggle(0);

    });

    $('nav.header-responsive li.active').addClass('open').children('ul').show();

    $("nav.header-responsive li.sub-menu> a").on('click', function () {
        $(this).removeAttr('href');
        var e = $(this).parent('li');
        if (e.hasClass('open')) {
            e.removeClass('open');
            e.find('li').removeClass('open');
            e.find('ul').slideUp(400);

        } else {
            e.addClass('open');
            e.children('ul').slideDown(400);
            e.siblings('li').children('ul').slideUp(400);
            e.siblings('li').removeClass('open');
        }
    });

    // Start scroll

    $(window).scroll(function () {
        if ($(this).scrollTop() > 60) {
            $("nav.header-responsive").css({ height: '60px' });
            $("nav.header-responsive .search-nav").css({ opacity: '0', visibility: 'hidden' });
        } else {
            $("nav.header-responsive").css({ height: '110px' });
            $("nav.header-responsive .search-nav").css({ opacity: '1', visibility: 'visible' });
        }
    });

    // End scroll

    // favorites product

    $("ul.gallery-options button.add-favorites").on("click", function () {
        $(this).toggleClass("favorites");
    });

    // favorites product

});
window.number_format = function (number, decimals, dec_point, thousands_point) {

    if (number == null || !isFinite(number)) {
        throw new TypeError("number is not valid");
    }

    if (!decimals) {
        var len = number.toString().split('.').length;
        decimals = len > 1 ? len : 0;
    }

    if (!dec_point) {
        dec_point = '.';
    }

    if (!thousands_point) {
        thousands_point = ',';
    }
    number = parseFloat(number).toFixed(decimals);

    number = number.replace(".", dec_point);

    var splitNum = number.split(dec_point);
    splitNum[0] = splitNum[0].replace(/\B(?=(\d{3})+(?!\d))/g, thousands_point);
    number = splitNum.join(dec_point);

    return number;
}
window.toPersianNum = function (num, dontTrim) {

    var i = 0,

        dontTrim = dontTrim || false,

        num = dontTrim ? num.toString() : num.toString().trim(),
        len = num.length,

        res = '',
        pos,

        persianNumbers = typeof persianNumber == 'undefined' ?
            ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'] :
            persianNumbers;

    for (; i < len; i++)
        if ((pos = persianNumbers[num.charAt(i)]))
            res += pos;
        else
            res += num.charAt(i);

    return res;
}
