import $ from 'jquery';
import slick from 'slick-carousel';

$('#slide-index').slick({
    dots: false,
    slidesToShow: 1,
    adaptiveHeight: true,
    infinite: true,
    speed: 400,
    autoplay: true,
    autoplaySpeed: 2000,
    lazyLoad: 'ondemand',
});

$('#slide-index-two, #image-phone, #image-laptop, #image-tablet').slick({
    dots: false,
    slidesToShow: 1,
    adaptiveHeight: true,
    infinite: true,
    speed: 400,
    autoplay: true,
    autoplaySpeed: 2000,
    prevArrow: false,
    nextArrow: false,
    lazyLoad: 'ondemand',
});


$('#promotion, #accessories').slick({
    dots: true,
    infinite: true,
    speed: 1000,
    slidesToShow: 5,
    slidesToScroll: 5,
    autoplay: true,
    autoplaySpeed: 3000,
    lazyLoad: 'ondemand',
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 4,
                slidesToScroll: 4,
                infinite: true,
                dots: true
            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
        },
        {
            breakpoint: 576,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
        }
    ]
});

