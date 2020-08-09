import $ from "jquery";
import slick from 'slick-carousel';

$('#product').slick({
    dots: false,
    slidesToShow: 1,
    adaptiveHeight: true,
    infinite: true,
    speed: 400,
    autoplay: true,
    autoplaySpeed: 2000,
    lazyLoad: 'ondemand',
});

$('#product-brand').slick({
    dots: true,
    infinite: true,
    speed: 1000,
    slidesToShow: 7,
    slidesToScroll: 7,
    autoplay: true,
    autoplaySpeed: 3000,
    lazyLoad: 'ondemand',
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 6,
                slidesToScroll: 6,
                infinite: true,
                dots: true
            }
        },
        {
            breakpoint: 992,
            settings: {
                slidesToShow: 5,
                slidesToScroll: 5,
                infinite: true,
                dots: true
            }
        },
        {
            breakpoint: 768,
            settings: {
                slidesToShow:4,
                slidesToScroll: 4,
                infinite: true,
                dots: true
            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3
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
            breakpoint: 400,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
        }
    ]
});

$('#product-new, #product-new-1, #product-new-2, #product-new-3').slick({
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
            breakpoint: 800,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3
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
                slidesToShow: 2,
                slidesToScroll: 2
            }
        },
        {
            breakpoint: 430,
            settings: {
                slidesToShow:2,
                slidesToScroll: 2
            }
        },
        {
            breakpoint: 390,
            settings: {
                slidesToShow:1,
                slidesToScroll: 1
            }
        }
    ]
});
