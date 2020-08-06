import axios from "axios";
import $ from "jquery";

const ShowCart = {
    init()
    {
        this.showCart();
        this.removeProductCart();
    },

    showCart()
    {
        $('.show-cart').click( () =>
        {
            let $allCart = $('#all-cart');
            $allCart.toggle();

            if($allCart.is(":visible"))
            {
                $('#all-cart .loading').addClass('show');
                this.getCart();
            }
        })
    },

    async getCart()
    {
        await axios.get('/shopping-cart')
            .then(res => {
                this.handelDataGetCart(res.data.items);
            })
            .catch(err => {
                console.log(err);
            })
    },

    handelDataGetCart($data)
    {
        let html = '';

        if ($data)
        {
            Object.keys($data).forEach((val) =>
            {
                let value   = $data[val];
                let item    = value.item;
                let image   = item.pro_image.split('|'); image       = image[0];
                let name    = item.pro_name;
                let qty     = value.qty;
                let price   = item.pro_price * ((100-item.pro_sale) / 100);
                price       = price.toString().replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");

                html += `
                <li>
                    <div class="row">
                        <div class="col-sm-2 total-qty">
                            <img src="http://doan.abc/upload/product/`+ image +`" alt="">
                            <span>` + qty + `</span>
                        </div>
                        <div class="col-sm-8">
                            <h4>` + name + `</h4>
                            <span>` + price + `đ</span>
                        </div>
                        <div class="col-sm-2">
                            <a href="javascript:void(0)" class="remove-pro-cart"  data-id="` + val +`">Xóa</a>
                        </div>
                    </div>
                </li>`
            });
        }
        else{
            html += '<li>Chưa có sản phẩm nào!</li>'
        }

        $('#all-cart .loading').removeClass('show');
        $('#all-cart ul').html(html);
    },

    removeProductCart()
    {
        let that = this;
        $(document).on('click', '.remove-pro-cart', function ()
        {
            let dataId = $(this).data('id');
            that.removeProductToCart(dataId);
        })
    },

    async removeProductToCart($id)
    {
        await axios.get('/remove-to-cart/' + $id)
            .then(res => {
                let $count = $('.countTotalCart');
                this.getCart();
                $count.html(parseInt($count.html()) - 1)
            })
            .catch(err => {
                console.log(err);
            })
    }
};

export default ShowCart;
