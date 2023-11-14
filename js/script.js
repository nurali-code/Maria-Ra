$(document).ready(function () {
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

    $('.dropdown-btn').on('click', function (e) {
        if ($(this).hasClass('active')) { $('.dropdown-btn').removeClass('active').next().slideUp(); }
        else {
            $('.dropdown-btn').removeClass('active').next().slideUp();
            $(this).toggleClass('active').next().slideToggle();
        }
    });

});

