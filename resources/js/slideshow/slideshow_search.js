import $ from "jquery";
import slick from 'slick-carousel';

$('#search-slideshow').slick({
    dots: false,
    slidesToShow: 2,
    adaptiveHeight: true,
    infinite: true,
    speed: 400,
    autoplay: true,
    autoplaySpeed: 2000,
    lazyLoad: 'ondemand',
});
