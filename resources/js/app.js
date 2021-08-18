function include(scriptUrl) {
    document.write('<script src="' + window.location.origin + '/' + scriptUrl + '"></script>');
}

function isIE() {
    var myNav = navigator.userAgent.toLowerCase();
    return (myNav.indexOf('msie') != -1) ? parseInt(myNav.split('msie')[1]) : false;
}
include('js/jquery.easing.1.3.js');
(function($) {
    var o = $('html');
    if (o.hasClass('desktop')) {
        include('js/tmstickup.js');
        $(document).ready(function() {
            $('#stuck_container').TMStickUp({})
        });
    }
})(jQuery);
(function($) {
    var o = $('html');
    if (o.hasClass('desktop')) {
        include('js/jquery.ui.totop.js');
        $(document).ready(function() {
            $().UItoTop({
                easingType: 'easeOutQuart'
            });
        });
    }
})(jQuery);
(function($) {
    var o = $('[data-equal-group]');
    if (o.length > 0) {
        include('js/jquery.equalheights.js');
    }
})(jQuery);
(function($) {
    var o = $('.resp-tabs');
    if (o.length > 0) {
        include('js/jquery.responsive.tabs.js');
        $(document).ready(function() {
            o.easyResponsiveTabs();
        });
    }
})(jQuery);
(function($) {
    include('js/jquery.rd-navbar.js');
})(jQuery);
(function($) {
    var o = $('.accordion');
    if (o.length > 0) {
        include('js/jquery.ui.accordion.min.js');
        $(document).ready(function() {
            o.accordion({
                active: false,
                header: '.accordion_header',
                heightStyle: 'content',
                collapsible: true
            });
        });
    }
})(jQuery);
(function($) {
    var o = $('html');
    if ((navigator.userAgent.toLowerCase().indexOf('msie') == -1) || (isIE() && isIE() > 9)) {
        if (o.hasClass('desktop')) {
            include('js/wow.js');
            $(document).ready(function() {
                new WOW().init();
            });
        }
    }
})(jQuery);
$(function() {
    var viewportmeta = document.querySelector && document.querySelector('meta[name="viewport"]'),
        ua = navigator.userAgent,
        gestureStart = function() {
            viewportmeta.content = "width=device-width, minimum-scale=0.25, maximum-scale=1.6, initial-scale=1.0";
        },
        scaleFix = function() {
            if (viewportmeta && /iPhone|iPad/.test(ua) && !/Opera Mini/.test(ua)) {
                viewportmeta.content = "width=device-width, minimum-scale=1.0, maximum-scale=1.0";
                document.addEventListener("gesturestart", gestureStart, false);
            }
        };
    scaleFix();
    if (window.orientation != undefined) {
        var regM = /ipod|ipad|iphone/gi,
            result = ua.match(regM);
        if (!result) {
            $('.sf-menus li').each(function() {
                if ($(">ul", this)[0]) {
                    $(">a", this).toggle(function() {
                        return false;
                    }, function() {
                        window.location.href = $(this).attr("href");
                    });
                }
            })
        }
    }
});
var ua = navigator.userAgent.toLocaleLowerCase(),
    regV = /ipod|ipad|iphone/gi,
    result = ua.match(regV),
    userScale = "";
if (!result) {
    userScale = ",user-scalable=0"
}
document.write('<meta name="viewport" content="width=device-width,initial-scale=1.0' + userScale + '">');
(function($) {
    var o = $('#camera');
    if (o.length > 0) {
        if (!(isIE() && (isIE() > 9))) {
            include('js/jquery.mobile.customized.min.js');
        }
        include('js/camera.js');
        $(document).ready(function() {
            o.camera({
                autoAdvance: true,
                height: '29.89583333333333%',
                minHeight: '350px',
                pagination: false,
                thumbnails: false,
                playPause: false,
                hover: false,
                easing: 'easeInOutExpo',
                loader: 'none',
                navigation: true,
                navigationHover: true,
                mobileNavHover: false,
                fx: 'simpleFade'
            })
        });
    }
})(jQuery);
(function($) {
    var o = $('.search-form');
    if (o.length > 0) {
        include('js/TMSearch.js');
    }
})(jQuery);
$(window).scroll(function() {
    if ($(this).scrollTop() > 0) {
        $("#advanced").css({
            position: 'fixed'
        });
    } else {
        $("#advanced").css({
            position: 'relative'
        });
    }
});
(function($) {
    var o = $('.lightbox');
    if (o.length > 0) {
        include('js/touchTouch.jquery.js');
        $(document).ready(function() {
            o.touchTouch();
        });
    }
})(jQuery);
(function($) {
    include('js/jquery.rd-parallax.js');
})(jQuery);

jQuery(document).ready(function() {

    const scrollTop = $(".scroll-top");
    if (scrollTop.length) {

        //Check to see if the window is top if not then display button
        $(window).on('scroll', function (){
            if ($(this).scrollTop() > 200) {
                scrollTop.fadeIn();
            } else {
                scrollTop.fadeOut();
            }
        });

        //Click event to scroll to top
        scrollTop.on('click', function() {
            $('html, body').animate({scrollTop : 0},1500);
            return false;
        });
    }

    // const mainSlider = jQuery(".main-slider");
    // if (mainSlider.length) {
    //     mainSlider.owlCarousel({
    //         loop: true,
    //         margin: 0,
    //         nav: true,
    //         dots: false,
    //         smartSpeed: 1000,
    //         items: 1,
    //         navText: ['<div class="camera_prev"></div>','<div class="camera_next"></div>']
    //     });
    // }

    //Init Slider
    $('.slider').slick({
        dots: true,
        infinite: true,
        speed: 1000,
        slidesToShow: 1,
        fade: true,
        cssEase: 'linear',
        prevArrow: false,
        nextArrow: false,
        autoplay: true,
        autoplaySpeed: 4000
    });

    const gallery = jQuery(".product-gallery");
    if (gallery.length) {
        gallery.owlCarousel({
            loop:false,
            margin:0,
            nav:false,
            dots:false,
            items: 1
        });

        gallery.on('changed.owl.carousel', function(event) {
            const index = event.item.index,
                items = thumbs.find(".owl-item");
            items.removeClass("current");
            return thumbs.trigger('to.owl.carousel', index) && items.eq(index).addClass("current");
        });

        const thumbs = jQuery(".thumbs-gallery");
        thumbs.owlCarousel({
            items: 6,
            margin: 5,
            nav:true,
            dots:false,
            responsive : {
                0 : {
                    items: 4
                },
                480 : {
                    items: 6
                },
                768 : {
                    items: 8
                }
            }
        });
        thumbs.on('click', 'img', function() {
            const _this = jQuery(this),
                index = _this.attr("data-index");
            thumbs.find(".owl-item").removeClass("current");
            return _this.closest(".owl-item").addClass("current") && gallery.trigger('to.owl.carousel', index);
        });
        thumbs.find(".owl-item").eq(0).addClass("current");
    }

    if (window.innerWidth >= 768) {
        jQuery("#stuck_container").sticky({zIndex: 20});
    }

    /*
    |-----------------------------------------------------------
    |   notification
    |-----------------------------------------------------------
    */
    const Notification = {
        element: false,
        setElement: function (element) {
            return this.element = element;
        },
        notify: function (message) {
            if( ! this.element) {
                this.setElement(jQuery(".notify"));
            }
            return this.element.html('<div>' + message + '</div>') && this.element.fadeIn().delay(7000).fadeOut();
        }
    };

    formHandler("#product-form", Notification);

});

jQuery.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
    }
});

function formHandler(selector, Notification) {
    return jQuery(document).on("submit", selector, function(e){
        e.preventDefault();
        const _this = jQuery(this),
            url = _this.attr('action'),
            data = _this.serialize(),
            submitBlock = _this.find(".submit"),
            submitBtn = submitBlock.find(".btn");
            //agree = _this.find(".i__agree input[type=checkbox]");
        // if (agree.length && ! agree.prop("checked")) {
        //     agree.closest(".i__agree").find(".error").fadeIn().delay(3000).fadeOut();
        //     return false;
        // }
        return jQuery.ajax({
            type: "POST",
            dataType: "json",
            url: url,
            data: data,
            beforeSend: function() {
                return submitBtn.addClass("is__sent") && submitBtn.prop("disabled",true);
            },
            success: function (data) {
                Notification.notify(data.message);
                return submitBtn.removeClass("is__sent") && _this.trigger("reset") && submitBtn.prop("disabled",false);
            }
        });
    });
}
jQuery(document).ajaxError(function () {
    return jQuery("form .submit").removeClass("is__sent") && jQuery('.notify').html('<div>Произошла ошибка =(</div>').fadeIn().delay(3000).fadeOut();
});