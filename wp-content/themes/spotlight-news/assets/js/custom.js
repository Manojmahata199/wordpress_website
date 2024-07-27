jQuery(function ($) {

    /* -----------------------------------------
    Sticky Header
    ----------------------------------------- */
    if ($(".bottom-header-part-outer").hasClass("header-fixed")) {
        const header = document.querySelector('.bottom-header-part-outer.header-fixed .bottom-header-part');
        window.onscroll = function () {
            if (window.pageYOffset > 200) {
                header.classList.add('fix-header');
            } else {
                header.classList.remove('fix-header');
            }
        };
        $(document).ready(function () {
            var divHeight = $('.bottom-header-part').height();
            $('.bottom-header-part-outer.header-fixed').css('min-height', divHeight + 'px');
        });
    }

    /* -----------------------------------------
    Editor Picks
    ----------------------------------------- */
    $('.editor-picks-wrapper.horizontal').slick({
        autoplay: true,
        autoplaySpeed: 3000,
        infinite: true,
        dots: false,
        arrows: true,
        rtl: $.RtlCheck(),
        slidesToShow: 4,
        nextArrow: '<button class="fas fa-angle-right slick-next"></button>',
        prevArrow: '<button class="fas fa-angle-left slick-prev"></button>',
        appendArrows: '.editor-pick-arrows.horizontal',
        responsive: [
            {
                breakpoint: 1025,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 769,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 601,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });

});