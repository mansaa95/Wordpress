(function ($) {
    "use strict"


    $('.hn-banner-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        speed: 500,
        autoplay: true,
        pauseOnHover: false,
        arrows: true,
        dots: true,
        fade: true,
    });



    // Menu dropdown on hover
    extendNav();
    function extendNav() {
        $('.nav-wrapper .navbar-collapse .dropdown').on({
            mouseenter: function () {
                jQuery(this).children('.dropdown-menu').stop(true, true).show().addClass('animated-fast slfadeInDown');
                jQuery(this).toggleClass('open');
            },
            mouseleave: function () {
                jQuery(this).children('.dropdown-menu').stop(true, true).hide().removeClass('animated-fast slfadeInDown');
                jQuery(this).toggleClass('open');
            }
        });
    }

    //gallery
    $('.post-format-gallery').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        speed: 500,
        autoplay: true,
        arrows: true
    });


    if (jQuery(window).width() <= 767) {
        jQuery('div, section').removeClass('parallax');
    }

    $(document).ready(function () {

        $('#simple-menu').sidr({
            speed: 600,
            side: 'right',
            body: '.offcanvas-wrap'
        });
        $.sidr('close', 'sidr');
        // $(window).on('resize',function(){
        //     $('#simple-menu').trigger('click');
        // });

        $(".menu-close").on("click", function (e) {
            $.sidr('close', 'sidr');
        });
    });


    $('<i class="icon ion-android-arrow-forward sidedropdown"></i>').appendTo($("#sidr li.menu-item-has-children > a"));

    $("#sidr ul .sidedropdown").on('click', function (event) {
        event.preventDefault();
        $(this).toggleClass('open');
        $(this).toggleClass('first');
        $(this).parent().next('.dropdown-menu').toggleClass('open');
    });





    $(window).scroll(function () {
        if ($('.nav-wrapper').hasClass('sticking') && $('div').hasClass('sticky-hide')) {
            $('.custom-logo-link').hide();
            $('.sticky-hide').show();
        }
        else {
            $('.custom-logo-link').show();
            $('.alt-logo').hide();
        }
    });


            [].slice.call(document.querySelectorAll('.hasten-tab')).forEach(function (el) {
                new CBPFWTabs(el);
            });

    function responsiveIframe() {
        var videoSelectors = [
            'iframe[src*="player.vimeo.com"]',
            'iframe[src*="youtube.com"]',
            'iframe[src*="youtube-nocookie.com"]',
            'iframe[src*="kickstarter.com"][src*="video.html"]',
            'iframe[src*="screenr.com"]',
            'iframe[src*="blip.tv"]',
            'iframe[src*="dailymotion.com"]',
            'iframe[src*="viddler.com"]',
            'iframe[src*="qik.com"]',
            'iframe[src*="revision3.com"]',
            'iframe[src*="hulu.com"]',
            'iframe[src*="funnyordie.com"]',
            'iframe[src*="flickr.com"]',
            'embed[src*="v.wordpress.com"]',
            'iframe[src*="videopress.com"]',
            'embed[src*="videopress.com"]'
            // add more selectors here
        ];
        var allVideos = videoSelectors.join(',');
        jQuery(allVideos).wrap('<span class="media-holder" />');
    }

    // Responsive Iframes
    responsiveIframe();



    $('.header-search i').on('click', function () {
        $('.search').addClass('open');
        $('.menu-close').trigger('click');
        $('.search-close, .input').fadeIn(500);
    });

    $('.search-close').on('click', function () {
        $('.search').removeClass('open');
        $('.search-close, .input').fadeOut(500);
    });



    $(document).keyup(function (e) {
        if (e.which === 27) {
            closeModal();
        }
    });

    function enterNewConvo() {
        $('.create-chat-input').focus();
    }

    $('[data-toggle="tooltip"]').tooltip();

    $('#close').click(function () {
        closeModal();
    });

    function closeModal() {
        $('.modal-frame').removeClass('active');
        $('.modal-frame').addClass('leave');
    }

    if (jQuery(".timer").length) {
        jQuery(document).on('scroll', function () {
            var hT = jQuery('.timer').offset().top,
                hH = jQuery('.timer').outerHeight(),
                wH = jQuery(window).height(),
                wS = jQuery(this).scrollTop();
            if (wS > (hT + hH - wH)) {
                jQuery(document).off('scroll');
                jQuery('.timer').countTo();
            }
        });
    }

    $(".video-popup").YouTubePopUp();

    $('.nav-wrapper').stickMe({
        transitionDuration: 500,
        shadow: true,
        shadowOpacity: 0.6,
        animate: true,
        transitionStyle: 'slide'
    });


    $('.team-slider').slick({
        infinite: true,
        autoplaySpeed: 7000,
        arrows: false,
        dots: false,
        autoplay: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 990,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    infinite: true,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });

    $('.team2-slider').slick({
        infinite: true,
        autoplaySpeed: 7000,
        arrows: false,
        dots: false,
        autoplay: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 990,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    infinite: true,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });

    $('.client-slider').slick({
        infinite: true,
        autoplaySpeed: 7000,
        arrows: false,
        dots: false,
        autoplay: true,
        slidesToShow: 6,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 990,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    infinite: true,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            }
        ]
    });


    $('.testimonial-content.testimonial-col3').slick({
        infinite: true,
        autoplaySpeed: 7000,
        arrows: false,
        dots: false,
        autoplay: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 990,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    infinite: true,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });

    $('.testimonial-content.testimonial-col1').slick({
        infinite: true,
        autoplaySpeed: 7000,
        arrows: false,
        dots: false,
        autoplay: true,
        slidesToShow: 1,
        slidesToScroll: 1,
    });

    $('.sidebar-page .related-posts').slick({
      infinite: true,
      autoplaySpeed: 7000,
      arrows: false,
      slidesToShow: 2,
      autoplay: true,
      slidesToScroll: 1,
      responsive: [
          {
            breakpoint: 990,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1,
              infinite: true,
            }
          },
          {
            breakpoint: 768,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
            }
          }
      ]
    });

    $('.no-sidebar .related-posts').slick({
      infinite: true,
      autoplaySpeed: 7000,
      arrows: false,
      slidesToShow: 3,
      autoplay: true,
      slidesToScroll: 2,
      responsive: [
          {
            breakpoint: 990,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 2,
              infinite: true,
            }
          },
          {
            breakpoint: 768,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1,
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
            }
          }
      ]
    });

    $('.related-posts .post-gallery').slick({
      dots: false,
      infinite: true,
      speed: 500,
      autoplay: true,
      arrows: false,
    });


    AOS.init({
        duration: 800,
        easing: 'ease-in-sine',
        delay: 500,
        once: 'true',
    });

    $('.popup-link').magnificPopup({
        type: 'image',
        mainClass: 'mfp-zoom-in',
        tLoading: '',
        removalDelay: 500, //delay removal by X to allow out-animation
        callbacks: {

            imageLoadComplete: function () {
                var self = this;
                setTimeout(function () {
                    self.wrap.addClass('mfp-image-loaded');
                }, 16);
            },
            close: function () {
                this.wrap.removeClass('mfp-image-loaded');
            },
        },

        closeBtnInside: true,
        closeOnContentClick: true,
        midClick: true
    });



    //parallax
    $('.parallax').jarallax({

        // parallax effect speed. 0.0 - 1.0
        speed: 0.3,

        // path to your parallax image
        imgSrc: null,

        // width & height of your parallax image
        imgWidth: 1366,
        imgHeight: 768,

        // enable transformations for effect if supported.
        enableTransform: false,

        // z-index of parallax container.
        zIndex: -100

    });

})(jQuery);
