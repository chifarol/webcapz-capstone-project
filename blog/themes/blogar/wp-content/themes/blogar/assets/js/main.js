(function (window, document, $, undefined) {
    'use strict';
    var axilInit = {
        i: function (e) {
            axilInit.s();
            axilInit.methods();
        },

        s: function (e) {
            this._window = $(window),
                this._document = $(document),
                this._body = $('body'),
                this._html = $('html'),
                this._subscribePopUp = $('.subscribe-popup')
        },
        methods: function (e) {
            axilInit.w();
            axilInit.axilHover();
            axilInit.axilBackToTop();
            axilInit.axilSlickActivation();
            axilInit.loadSubscribePopup();
            // axilInit.megamenuHover();
            axilInit.mobileMenuShow();
            axilInit.mobileMenuHide();
            axilInit.mobileMenuNew();
            axilInit.trendPost();
            axilInit.stickHeader();
            axilInit.cursorAnimate();
            axilInit.onhoverAnimated();
            axilInit.searchClick();
            axilInit._clickDoc();
            axilInit.preloaderInit();
        },

        w: function (e) {
            this._window.on('load', axilInit.l).on('scroll', axilInit.scrl).on('resize', axilInit.res)
        },

        scrl: function () {

        },

        stickHeader: function () {
            axilInit._window.scroll(function () {
                if ($(this).scrollTop() > 250) {
                    $('.header-sticky').addClass('sticky');
                    $('body').addClass('header-sticky-now');
                }else{
                    $('.header-sticky').removeClass('sticky');
                    $('body').removeClass('header-sticky-now');
                }
            })
        },


        mobileMenuShow: function () {
            $('.hamburger-menu').on('click', function (e) {
                e.preventDefault();
                axilInit._body.addClass('popup-mobile-menu-show'),
                    axilInit._html.css({
                        overflow: 'hidden'
                    });
            });
        },


        mobileMenuNew: function (e) {
            $('.mobile-close').on('click', function (e) {
                e.preventDefault();
                axilInit._body.removeClass('popup-mobile-menu-show'),
                    axilInit._html.css({
                        overflow: ''
                    });
                $('.has-children > a').removeClass('open').siblings('.submenu, .megamenu-sub-menu').slideUp('400');
            })
            $('.popup-mobilemenu-area').on('click', function (e) {
                e.target === this && axilInit._body.removeClass('popup-mobile-menu-show'),
                    axilInit._html.css({
                        overflow: ''
                    });
            })
            var screenWidth = axilInit._window.width();
            if (screenWidth < 1200) {
                $('.has-children > a').on('click', function (e) {
                    e.preventDefault();
                    $(this).siblings('.submenu, .megamenu-sub-menu').slideToggle('400');
                    $(this).toggleClass('open').siblings('.submenu, .megamenu-sub-menu').toggleClass('active');
                })
            }
        },

        preloaderInit: function(){
            axilInit._window.on('load', function () {
                $('#preloader').fadeOut('slow', function () {
                    $(this).remove();
                });
            });
        },


        searchClick:function (e) {
            var screenWidth = axilInit._window.width();
            if (screenWidth < 576) {
                $('.search-mobile-icon').on('click', function (e) {
                    e.preventDefault();
                    $(this).toggleClass('open').siblings('.large-mobile-blog-search').toggleClass('active');
                })
            }
        },

        cursorAnimate: function () {
            var myCursor = jQuery('.mouse-cursor');
            if (myCursor.length) {
                if ($('body')) {
                    const e = document.querySelector('.cursor-inner'),
                        t = document.querySelector('.cursor-outer');
                    let n, i = 0,
                        o = !1;
                    window.onmousemove = function (s) {
                        o || (t.style.transform = "translate(" + s.clientX + "px, " + s.clientY + "px)"), e.style.transform = "translate(" + s.clientX + "px, " + s.clientY + "px)", n = s.clientY, i = s.clientX
                    }, $('body').on("mouseenter", "a, .cursor-pointer", function () {
                        e.classList.add('cursor-hover'), t.classList.add('cursor-hover')
                    }), $('body').on("mouseleave", "a, .cursor-pointer", function () {
                        $(this).is("a") && $(this).closest(".cursor-pointer").length || (e.classList.remove('cursor-hover'), t.classList.remove('cursor-hover'))
                    }), e.style.visibility = "visible", t.style.visibility = "visible"
                }
            }
        },

        onhoverAnimated: function () {
            var cerchio = document.querySelectorAll('.cerchio');
            cerchio.forEach(function (elem) {
                $(document).on('mousemove touch', function (e) {
                    magnetize(elem, e);
                });
            })
            function magnetize(el, e) {
                var mX = e.pageX,
                    mY = e.pageY;
                const item = $(el);
                const customDist = item.data('dist') * 5 || 60;
                const centerX = item.offset().left + (item.width() / 2);
                const centerY = item.offset().top + (item.height() / 2);
                var deltaX = Math.floor((centerX - mX)) * -0.45;
                var deltaY = Math.floor((centerY - mY)) * -0.45;
                var distance = calculateDistance(item, mX, mY);
                if (distance < customDist) {
                    TweenMax.to(item, 0.5, {
                        y: deltaY,
                        x: deltaX,
                        scale: 1.05
                    });
                    item.addClass('magnet');
                } else {
                    TweenMax.to(item, 0.6, {
                        y: 0,
                        x: 0,
                        scale: 1
                    });
                    item.removeClass('magnet');
                }
            }

            function calculateDistance(elem, mouseX, mouseY) {
                return Math.floor(Math.sqrt(Math.pow(mouseX - (elem.offset().left + (elem.width() / 2)), 2) + Math.pow(mouseY - (elem.offset().top + (elem.height() / 2)), 2)));
            }
            /*- MOUSE STICKY -*/
            function lerp(a, b, n) {
                return (1 - n) * a + n * b
            }
        },

        loadSubscribePopup: function () {
            setTimeout(function () {
                axilInit._subscribePopUp.addClass('show-popup');
            }, 3000);
        },

        mobileMenuShow: function () {
            $('.hamburger-menu').on('click', function (e) {
                e.preventDefault();
                axilInit._body.addClass('popup-mobile-menu-show'),
                    axilInit._html.css({
                        overflow: 'hidden'
                    });
            });
        },

        mobileMenuHide: function () {
            $('.mobile-close').on('click', function (e) {
                e.preventDefault();
                axilInit._body.removeClass('popup-mobile-menu-show'),
                    axilInit._html.css({
                        overflow: ''
                    });
                $('.popup-mobilemenu-area .menu-item-has-children a').removeClass('open').siblings('.axil-submenu').slideUp('400');   

            })
            $('.popup-mobilemenu-area').on('click', function (e) {
                e.target === this && axilInit._body.removeClass('popup-mobile-menu-show'),
                    axilInit._html.css({
                        overflow: ''
                    });
            })
        },

        mobileMenu: function (e) {
            var screenWidth = axilInit._window.width();
            if (screenWidth < 1200) {
                $('.popup-mobilemenu-area .menu-item-has-children a').on('click', function (e) {
                    $(this).siblings('.axil-submenu').slideToggle('400');
                    $(this).toggleClass('open').siblings('.axil-submenu').toggleClass('active')
                })
            }
        },

        axilHover: function () {
            $('.content-direction-column, .post-listview-visible-color').mouseenter(function () {
                var self = this;
                $(self).removeClass('axil-control');
                setTimeout(function () {
                    $('.content-direction-column.is-active, .post-listview-visible-color .post-list-view.is-active').removeClass('is-active').addClass('axil-control');
                    $(self).removeClass('axil-control').addClass('is-active');
                }, 0);
            });
        },

        trendPost: function () {
            $(window).resize(function () {

            });
            //do something
            var width = axilInit._window.width();
            if (width > 991) {
                $('.trend-post').mouseenter(function () {
                    var self = this;
                    $(self).removeClass('axil-control');
                    setTimeout(function () {
                        $('.trend-post.is-active').removeClass('is-active').addClass('axil-control');
                        $(self).removeClass('axil-control').addClass('is-active');
                    }, 0);

                });
            }
        },

        megamenuHover: function () {
            var width = axilInit._window.width();
            if (width < 1200) {
                $('.vertical-nav-menu li.vertical-nav-item').hover(function () {
                    $('.axil-vertical-inner').hide();
                    $('.vertical-nav-menu li.vertical-nav-item').removeClass('active');
                    $(this).addClass('active');
                    var selected_tab = $(this).find('a').attr("href");
                    $(selected_tab).stop().fadeIn();
                    return false;
                }); 
            }
        },

        axilBackToTop: function () {
            var btn = $('#backto-top');
            $(window).scroll(function () {
                if ($(window).scrollTop() > 300) {
                    btn.addClass('show');
                } else {
                    btn.removeClass('show');
                }
            });
            btn.on('click', function (e) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: 0
                }, '300');
            });
        },

        
        axilSlickActivation: function (e) {
            
            $('.post-gallery-activation').slick({
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: true,
                dots: false,
                fade: true,
                adaptiveHeight: true,
                cssEase: 'linear',
                prevArrow: '<button class="slide-arrow prev-arrow"><i class="fal fa-arrow-left"></i></button>',
                nextArrow: '<button class="slide-arrow next-arrow"><i class="fal fa-arrow-right"></i></button>',
            });

        },
        
        _clickDoc: function (e) {
            var subscribePopupHide;
            subscribePopupHide = function (e) {
                if (!$('.subscribe-popup-inner, .subscribe-popup-inner *:not(.close-popup, .close-popup i, .newsletter-content .close-button)').is(e.target)) {
                    axilInit._subscribePopUp.fadeOut("300");
                }
            };
            axilInit._document
                .on('click', '.close-popup', subscribePopupHide)
                .on('click', subscribePopupHide)
        }
    }
    axilInit.i();

})(window, document, jQuery);