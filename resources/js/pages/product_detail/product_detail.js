import $ from 'jquery';
import slick from 'slick-carousel';
import Toast from '../../toastr/toastr'
import 'jquery-modal';
import axios from 'axios'
import ShowCart from "../../components/show_cart";
import SidebarMenu from "../../components/sidebar_mobile";
import CartHandel from "../../components/cart_handel";
import AjaxSearch from "../../components/ajax_search_product";

const ProductDetail = {
    init()
    {
        this.productDetailSlick();
        this.addToCart();
        ShowCart.init();
        SidebarMenu.init();
        CartHandel.init();
        AjaxSearch.init();
    },

    productDetailSlick()
    {
        $('#product-detail').slick({
            dots: false,
            slidesToShow: 1,
            adaptiveHeight: true,
            infinite: true,
            speed: 400,
            lazyLoad: 'ondemand',
        });

        $('#promotion, #product-same-brand').slick({
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
    },

    addToCart()
    {
        let that = this;
        $('.add-to-cart').click(function ()
        {
            let dataId = $(this).data('value'),
                dataValue = $('#amount').val();

            let data = {
                'qty' : parseInt(dataValue)
            };

            that.addProductToCard(dataId, data);
        });

    },

    async addProductToCard($id, $data)
    {
        await axios.get('/add-to-cart/' + $id, {params: $data})
            .then(res => {
                let length = Object.keys(res.data.items).length;
                $('.countTotalCart').html(length);
                $('#amount').val(1);
                Toast.showToastr();
                Toast.toastrAddSuccess('Thêm vào giỏ hàng thành công');
            })
            .catch(err => {
                if (err.response.status === 404)
                {
                    Toast.showToastr();
                    Toast.toastrAddError('Không được đặt quá 10 sản phẩm');
                }
            })
    },
};


$(function () {
    ProductDetail.init();
});

