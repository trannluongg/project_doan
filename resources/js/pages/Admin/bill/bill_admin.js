import axios from 'axios';
import Toastr from '../../../../js/toastr/toastr';
import Loading from '../../../../js/loading/loading';
import $ from "jquery";
import Toast from "../../../toastr/toastr";

const Bill = {
    init()
    {
        this.updateBillStatus();
        this.getBillEdit();
        this.editBill();
        this.billDetail();
        this.updateBill();
        this.deleteProductBill();
    },

    getBillEdit()
    {
        let that = this;

        $('#bill .edit').click(function ()
        {
            let id = $(this).data('id');

            Loading.loadingShow();

            $('#card-edit').show();

            setTimeout(() => {
                that.getBill(id);
            }, 500);
        });

    },

    async getBill(id)
    {
        await axios.get('/admin/bills/' + id)
            .then(res =>
            {
                Loading.loadingHide();
                let data = res.data.data.data;
                $('#bill-id').val(data.id);
                $('#name-bil-edit').val(data.username);
                $('#address-bil-edit').val(data.user_address);
                $('#phone-bil-edit').val(data.user_phone);
            })
            .catch(err =>
            {
                Loading.loadingHide();
            });
    },

    editBill() {
        let that = this;

        $('#edit-bill').click(function ()
        {
            that.resetEditError();

            let id              = $('#bill-id').val();
            let name            = $('#name-bil-edit').val();
            let address         = $('#address-bil-edit').val();
            let phone           = $('#phone-bil-edit').val();

            if (name !== '' && address !== '' && phone !== '')
            {
                id = parseInt(id);

                let data = {
                    username: name,
                    user_address: address,
                    user_phone: phone
                };
                Loading.loadingShow();
                that.putEditBill(id, data);
            }
            else{
                alert('Enter the input, not Empty!');
            }
        });
    },

    async putEditBill(id, data)
    {
        let that = this;

        await axios.post('/admin/bills/' + id, data)
            .then(() =>
            {
                $('#card-edit').hide();
                that.resetFormEdit();
                Loading.loadingHide();
                Toastr.showToastr();
                Toastr.toastrUpdateSuccess();
            })
            .catch(err =>
            {
                Loading.loadingHide();
                Toastr.toastrUpdateError();
                that.handleErrorEdit(err.response.data);
            });
    },

    handleErrorEdit(errors) {
        let name        = errors.username;
        let address     = errors.user_address;
        let phone       = errors.user_phone;

        let that = this;

        if (name !== undefined)
        {
            let error_name = that.handelErrorName(name);
            $('#err-bil-edit-name').append(error_name);
        }

        if (address !== undefined)
        {
            let error_address = that.handelErrorAddress(address);
            $('#err-bil-edit-address').append(error_address);
        }

        if (phone !== undefined)
        {
            let error_phone = that.handelErrorPhone(phone);
            $('#err-bil-edit-phone').append(error_phone);
        }
    },

    handelErrorName(name)
    {
        let error_name = '';
        name.forEach(value => {
            error_name += '<span class="text-danger" style="font-size: 13px">' + value + '</span>';
        });

        return error_name;
    },

    handelErrorAddress(address)
    {
        let error_address = '';
        address.forEach(value => {
            error_address += '<span class="text-danger" style="font-size: 13px">' + value + '</span>';
        });

        return error_address;
    },

    handelErrorPhone(phone)
    {
        let error_phone = '';
        phone.forEach(value => {
            error_phone += '<span class="text-danger" style="font-size: 13px">' + value + '</span>';
        });

        return error_phone;
    },

    resetFormEdit()
    {
        $('#name-bil-edit').val('');
        $('#address-bil-edit').val('');
        $('#phone-bil-edit').val('');
        this.resetEditError();
    },

    resetEditError()
    {
        $('#err-bil-edit-phone').html('');
        $('#err-bil-edit-name').html('');
        $('#err-bil-edit-address').html('');
    },

    updateBillStatus()
    {
        let that = this;
        $('.bill-status').change(function ()
        {
            let $value      = $(this).val(),
                $bill_id    = $(this).data('id');

            let data = {
                status: $value
            };

            that.postUpdateBillStatus($bill_id, data);
        })
    },

    async postUpdateBillStatus(id, data)
    {
        await axios.post('/admin/bills/update-status/' + parseInt(id), data)
            .then(() =>
            {
                Loading.loadingHide();
                Toastr.showToastr();
                Toastr.toastrUpdateSuccess();
            })
            .catch(err =>
            {
                Loading.loadingHide();
                Toastr.toastrUpdateError();
            });
    },

    billDetail()
    {
        let that = this;
        $('.bill-detail').click(function ()
        {
            let $bill_id = $(this).data('id');
            Loading.loadingShow();
            that.getBillDetail(parseInt($bill_id))
        });
    },

    async getBillDetail(id)
    {
        let that = this;

        await axios.get('/admin/bills/detail/' + id)
            .then((res) =>
            {
                $('#body-bill-detail').html('');
                that.handelDataBillDetail(res.data);
                Loading.loadingHide();
            })
            .catch(err =>
            {
                Loading.loadingHide();
            });
    },

    handelDataBillDetail(data)
    {
        let html = '';

        let sum_money = data.sum_money.toString().replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");

        $('#bill-detail-id span').html(data.id);

        let length_bill = Object.keys(data['bill']).length;

        Object.keys(data['bill']).forEach(index =>
        {
            let value = data['bill'][index];
            let item = value.item;
            let id    = item.id;
            let name    = item.name;
            let total    = item.total;
            let promotion   = item.promotion;
            let image   = item.image[0];
            let qty     = value.qty;
            let price   = item.price * ((100-item.sale) / 100);
            let price_sale       = price.toString().replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");

            html += `
            <div class="fs-ghli proitem">
                    <div class="fs-ghltb clearfix">
                        <div class="fs-ghltd fs-ghltb1">
                            <p class="fs-ghimg">
                                <a href="javascript:void(0)">
                                    <img src="http://doan.abc/upload/product/` + image + `" alt="` + name + `">
                                </a>
                            </p>
                        </div>
                        <div class="fs-ghcaif">
                            <div class="fs-ghcatbs">
                                <div class="fs-ghltd fs-ghif">
                                    <h3 class="fs-ghname">
                                        <a href="javascript:void(0)">`+name+`</a>
                                    </h3>
                                    <p class="promotion">`+promotion+`</p>
                                </div>
                                <div class="fs-ghltd fs-ghpri">
                                    <p class="fs-ghpri1">`+price_sale+` <sup>đ</sup></p>
                                </div>
                                <div class="fs-ghltd fs-ghplus">
                                    <div class="fs-ghpltb clearfix">
                                        <input class="fs-ghplip amount-detail" type="text"  data-id="`+id+`" data-total="`+total+`" value="`+qty+`">
                                    </div>
                                </div>
                                <span class="fs-ghdel bill-delete" data-id="`+id+`" onclick="return confirm('Bạn muốn xóa sản phẩm này khỏi giỏ hàng chứ!')">⨯</span>
                            </div>
                        </div>
                    </div>
                </div>
            `;
        });

        html += ` <div class="ghg-bot clearfix">
                    <ul class="ghg-bor clearfix">
                        <li class="ghg-br2">
                            <label style="margin-bottom: 0">Tổng tiền:</label>
                            <span class="fs-ghrttpri total-money">`+sum_money+`<sup>đ</sup></span>
                        </li>
                    </ul>
                </div>`;

        $('#body-bill-detail').html(html);
        if(length_bill === 1) $('.bill-delete').remove();
    },

    updateBill()
    {
        let that = this;

        $(document).on('change', '.amount-detail', function ()
        {
            let $id_product     = $(this).data('id');
            let $id_bill        = $('#bill-detail-id span').html();
            let $product_qty    = $(this).val();

            if (isNaN($product_qty) || $product_qty.trim() === '')
            {
                $product_qty = 1;
            }
            else{
                if ($product_qty > 100)
                {
                    alert('Không được đặt quá 10 sản phẩm');
                    $product_qty = 10;
                }
            }

            $(this).val(parseInt($product_qty));

            let data = {
                'product_id'    : $id_product,
                'bill_id'       : parseInt($id_bill),
                'product_qty'   : $product_qty,
            };

            $('.loading-cart').fadeIn();

            that.updateBillDetail(data);
        })
    },

    async updateBillDetail(data)
    {
        await axios.post('/admin/bill-detail/update/detail', data)
            .then(res =>
            {
                $('.loading-cart').fadeOut();

                let price = res.data.data.data.sum_money.toString().replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
                $('.total-money').html(price + '<sup>đ</sup>');
                Toast.showToastr();
                Toast.toastrUpdateSuccess('Update đơn hành thành công!');
            })
            .catch(err => {
                if (err.response.status === 404)
                {
                    Toast.showToastr();
                    Toast.toastrAddError('Update đơn hành thất bại');
                }
            })
    },

    deleteProductBill()
    {
        let that = this;

        $(document).on('click', '.bill-delete', function ()
        {
            let $id_product     = $(this).data('id');
            let $id_bill        = $('#bill-detail-id span').html();

            let data = {
                product_id: $id_product,
                bill_id: parseInt($id_bill)
            };

            $('.loading-cart').fadeIn();

            that.postDeleteProductBill(data, $(this));
        })
    },

    async postDeleteProductBill(data,ele)
    {
        await axios.post('/admin/bill-detail/remove/product/detail', data)
            .then(res =>
            {
                ele.parent().parent().parent().parent().remove();

                let length_product_bill = $('.fs-ghli.proitem').length;

                if (length_product_bill === 1) $('.bill-delete').remove();

                $('.loading-cart').fadeOut();

                let price = res.data.data.data.sum_money.toString().replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");

                $('.total-money').html(price + '<sup>đ</sup>');

                Toast.showToastr();

                Toast.toastrUpdateSuccess('Update đơn hành thành công!');
            })
            .catch(err =>
            {
                if (err.response.status === 404)
                {
                    Toast.showToastr();
                    Toast.toastrAddError('Update đơn hành thất bại');
                }
            })
    }
};

$(function () {
    Bill.init();
});

