import axios from 'axios'
import ShowCart from "../../components/show_cart";
import SidebarMenu from "../../components/sidebar_mobile";
import $ from "jquery";
import Toast from "../../toastr/toastr";
import AjaxSearch from "../../components/ajax_search_product";
import 'jquery-modal';

const Cart = {
    init()
    {
        ShowCart.init();
        SidebarMenu.init();
        this.amountIncrease();
        this.amountReduction();
        this.amountChange();
        this.getProductRemoveToCart();
        AjaxSearch.init();
    },

    amountIncrease()
    {
        let that = this;
        $('.amount-increase').click(function ()
        {

            let $getDisable     = $(this).attr('disabled');

            if ($getDisable) return false;

            $(this).attr('disabled', true);

            let $amount         = $(this).siblings().eq(1);
            let $id             = $(this).data('id');
            let $valueAmount    = $amount.val();

            if ($valueAmount > 9) return alert('Không được đặt quá 10 sản phẩm');

            $('.loading-cart').fadeIn();

            $amount.val(parseInt($valueAmount) + 1);

            let data = {
                'qty' : 1
            };

            that.updateCartIncrease($id, data);
        })
    },

    async updateCartIncrease($id,data)
    {
        await axios.get('/add-to-cart/' + $id, {params: data})
            .then(res =>
            {
                this.handelUpdateSuccess(res);
            })
            .catch(err => {
                if (err.response.status === 404)
                {
                    Toast.showToastr();
                    Toast.toastrAddError('Update giỏ hành thất bại');
                }
            })
    },

    amountReduction()
    {
        let that = this;

        $('.amount-reduction').click(function ()
        {
            let $getDisable     = $(this).attr('disabled');

            if ($getDisable) return false;

            $(this).attr('disabled', true);

            let $amount         = $(this).siblings().eq(0);
            let $id             = $(this).data('id');
            let $valueAmount    = $amount.val();

            if ($valueAmount <= 1) return alert('Số lượng sản phẩm không được nhỏ hơn 1');

            $('.loading-cart').fadeIn();

            let value_sp = parseInt($valueAmount) - 1;

            $amount.val(value_sp);

            that.updateCartReduction($id);

        })
    },

    async updateCartReduction($id)
    {
        await axios.get('/remove-one-to-cart/' + $id)
            .then(res =>
            {
                this.handelUpdateSuccess(res, false)

            })
            .catch(err => {
                if (err.response.status === 404)
                {
                    Toast.showToastr();
                    Toast.toastrAddError('Update giỏ hành thất bại');
                }
            })
    },

    handelUpdateSuccess(res, flag = true)
    {
        if(res.data.length <= 0)
        {
            $('#cart').html('');
        }
        if (flag) $('.amount-increase').attr('disabled', false);
        else $('.amount-reduction').attr('disabled', false);

        let totalPrice  = res.data.totalPrice;

        totalPrice      = totalPrice
            .toString()
            .replace(/\D/g, "")
            .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ".");
        $('.total-money').html(totalPrice + '<sup>đ</sup>');
        $('.loading-cart').fadeOut();

        Toast.showToastr();
        Toast.toastrAddSuccess('Update giỏ hàng thành công');
    },

    amountChange()
    {
        let that = this;

        $('.amount').change(function ()
        {
            let $value  = $(this).val();
            let $id     = $(this).data('id');

            if (isNaN($value) || $value.trim() === '')
            {
                $value = 1;
            }
            else{
                if ($value > 10)
                {
                    alert('Không được đặt quá 10 sản phẩm');
                    $value = 10;
                }
            }
            $('.loading-cart').fadeIn();
            $(this).val(parseInt($value));

            let data = {
                'qty' : $value,
                'flag': 1
            };

            that.updateCartIncrease($id, data);
        });
    },

    getProductRemoveToCart()
    {
        let that = this;
        $('.order-delete').click(function ()
        {
            let $id = $(this).data('id');
            $('.loading-cart').fadeIn();
            that.removeProductToCart($id, $(this));
        });
    },

    async removeProductToCart($id, $element)
    {
        await axios.get('/remove-to-cart/' + $id)
            .then(res =>
            {
                $('.loading-cart').fadeOut();
                let $count = $('.countTotalCart');
                $count.html(parseInt($count.html()) - 1);
                console.log(res);
                this.handelUpdateSuccess(res);
                $element.parent().parent().parent().parent().remove();
            })
            .catch(err => {
                console.log(err);
            })
    }

};

$(function () {
   Cart.init();
});
