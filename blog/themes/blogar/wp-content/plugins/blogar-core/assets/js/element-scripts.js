(function ($) {
    "use strict";

    var $document = $(document),
        $window = $(window),
        isEditMode = false;

    /**
     * Undefined Check
     * @param $selector
     * @param $data_atts
     * @returns {string}
     */
    function mybe_note_undefined($selector, $data_atts) {
		return ($selector.data($data_atts) !== undefined) ? $selector.data($data_atts) : '';
	}

	// SliderActivationWithSlick
    var SliderActivationWithSlick = function ($scope, $) {
        $('.slider-activation').slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            dots: false,
            fade: true,
            adaptiveHeight: true,
            cssEase: 'linear',
            prevArrow: '<button class="slide-arrow prev-arrow"><i class="fal fa-arrow-left"></i></button>',
            nextArrow: '<button class="slide-arrow next-arrow"><i class="fal fa-arrow-right"></i></button>'
        });
    }

	// SliderActivationWithSlick
    var ModernSliderActivationWithSlick = function ($scope, $) {
        $('.modern-post-activation').slick({
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            arrows: true,
            dots: false,
            prevArrow: '<button class="slide-arrow prev-arrow"><i class="fal fa-arrow-left"></i></button>',
            nextArrow: '<button class="slide-arrow next-arrow"><i class="fal fa-arrow-right"></i></button>',
            responsive: [{
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                }
            },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                    }
                }
            ]
        });

        // Bootstrap Tab With Slick
        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            $('.modern-post-activation').slick('setPosition');
        });
    }

	// SliderActivationWithSlick
    var CreativeActivationWithSlick = function ($scope, $) {
        $('.slick-nav-avtivation-new').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            vertical: true,
            asNavFor: '.slick-for-avtivation-new',
            dots: false,
            focusOnSelect: true,
            verticalSwiping: false,
            centerMode: false,
            centerPadding: '0',
            arrows: false,
            autoplay: true,
            autoplaySpeed: 5000,
            infinite: false,
            responsive: [{
                breakpoint: 1199,
                settings: {
                    vertical: true,
                    slidesToShow: 3,
                }
            },
                {
                    breakpoint: 992,
                    settings: {
                        vertical: true,
                        slidesToShow: 3,
                        adaptiveHeight: true,
                    }
                },
                {
                    breakpoint: 577,
                    settings: {
                        vertical: true,
                        slidesToShow: 2,
                        adaptiveHeight: true,
                    }
                }
            ]

        });

        $('.slick-for-avtivation-new').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            asNavFor: '.slick-nav-avtivation-new',
            infinite: false,
            autoplay: true,
            responsive: [{
                breakpoint: 769,
            }]
        });
    }

	// SliderActivationWithSlick
    var CategoriesActivation = function ($scope, $) {
        $('.categories-activation').slick({
            infinite: true,
            slidesToShow: 6,
            slidesToScroll: 1,
            arrows: true,
            dots: false,
            adaptiveHeight: true,
            prevArrow: '<button class="slide-arrow prev-arrow"><i class="fal fa-arrow-left"></i></button>',
            nextArrow: '<button class="slide-arrow next-arrow"><i class="fal fa-arrow-right"></i></button>',
            responsive: [{
                breakpoint: 992,
                settings: {
                    slidesToShow: 5,
                }
            },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 4,
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                    }
                }

            ]
        });
    }

	// SliderActivationWithSlick
    var VerticalTabPosts = function ($scope, $) {
        // var screenWidth = this.window.width();
        var screenWidth = $window.width();
        if (screenWidth > 1200) {
            $('.vertical-nav-menu li.vertical-nav-item').hover(function () {
                $('.axil-vertical-inner').hide();
                $('.vertical-nav-menu li.vertical-nav-item').removeClass('active');
                $(this).addClass('active');
                var selected_tab = $(this).find('a').attr("href");
                $('.axil-vertical-inner' + selected_tab).stop().fadeIn();
                return false;
            });
        }
        if (screenWidth < 1200) {
            $('.vertical-nav-menu li.vertical-nav-item').off().on("click", function () {
                $('.axil-vertical-inner').hide();
                $('.vertical-nav-menu li.vertical-nav-item').removeClass('active');
                $(this).addClass('active');
                var selected_tab = $(this).find('a').attr("href");
                $('.axil-vertical-inner' + selected_tab).stop().show();
                return false;
            });
        }
    }





    // Init
    $window.on('elementor/frontend/init', function () {
	    if(elementorFrontend.isEditMode()) {
	        isEditMode = true;
	    }
        elementorFrontend.hooks.addAction('frontend/element_ready/blogar-post-slider.default', SliderActivationWithSlick);
        elementorFrontend.hooks.addAction('frontend/element_ready/blogar-creative-slider.default', CreativeActivationWithSlick);
        elementorFrontend.hooks.addAction('frontend/element_ready/blogar-category-list.default', CategoriesActivation);
        elementorFrontend.hooks.addAction('frontend/element_ready/blogar-Vertical-tab-with-post.default', VerticalTabPosts);
        elementorFrontend.hooks.addAction('frontend/element_ready/blogar-tab-with-grid-style.default', ModernSliderActivationWithSlick);
    });

}(jQuery));