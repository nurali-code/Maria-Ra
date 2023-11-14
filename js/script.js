$(document).ready(function () {
    $('a[href*="#"]').on('click', function (e) {
        e.preventDefault();
        $('html, body').animate({ scrollTop: $($(this).attr('href')).offset().top, }, 300,)
    });

    $('.btn-menu').on('click', function (e) {
        $(this).toggleClass('active');
        $('.header .nav, body').toggleClass('active');
    });

    $('.hero-slider').slick({
        arrows: true,
        infinite: true,
        speed: 600,
        // autoplay: true,
        // autoplaySpeed: 3000,
        slidesToShow: 1,
        centerPadding: '0px',
        centerMode: true,
    });

    $('.direction-slider').slick({
        arrows: false,
        infinite: false,
        dots: true,
        speed: 600,
        slidesToShow: 1,
        centerPadding: '0px',
        centerMode: true,
        mobileFirst: true,
        responsive: [
            {
                breakpoint: 1000,
                settings: "unslick",
            },
        ]
    });

    function hideModals() {
        $('.modal').fadeOut();
        $('body, .header .nav, .btn-menu').removeClass('active');
    };

    $(function () {
        function showModal(id) {
            $(id).fadeIn(300);
            $('body').addClass('active');
        }

        $('[data-modal]').on('click', function (e) {
            e.preventDefault();
            showModal('#' + $(this).attr("data-modal"));
        });

        $('.modal-close').on('click', () => {
            hideModals();
        });

        $(document).on('click', function (e) {
            if (!(
                ($(e.target).parents('.modal-content').length) ||
                // ($(e.target).parents('.nav').length) ||
                // ($(e.target).hasClass('nav')) ||
                ($(e.target).hasClass('btnModal')) ||
                ($(e.target).hasClass('btn')) ||
                ($(e.target).hasClass('btn-menu')) ||
                ($(e.target).hasClass('modal-content'))
            )) {
                hideModals();
            }
        });
    });


    $('.dropdown-btn').on('click', function (e) {
        if ($(this).hasClass('active')) { $('.dropdown-btn').removeClass('active').next().slideUp(); }
        else {
            $('.dropdown-btn').removeClass('active').next().slideUp();
            $(this).toggleClass('active').next().slideToggle();
        }
    });

});

