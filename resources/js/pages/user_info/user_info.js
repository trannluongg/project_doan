import SidebarMenu from "../../components/sidebar_mobile";
import AjaxSearch from "../../components/ajax_search_product";
import ShowCart from "../../components/show_cart";
import axios from "axios";
import Toast from '../../toastr/toastr';
import 'jquery-validation';

const User = {
    init()
    {
        SidebarMenu.init();
        AjaxSearch.init();
        ShowCart.init();
        this.updateInfoUser();
        this.updatePassword();
        this.validateForm();
        this.inputFocusResetError();
        this.updateAvatar();
        this.billCancel();
        this.billAgain();
        this.validateFormPassword();
    },

    updateInfoUser()
    {
        $('#btn-update-info').click( () =>
        {
            this.resetFormError();

            let $form = $('#update-info'),
                $id   = $('#user-id').val();

            if (!$form.valid()) return false;

            let formData = new FormData($form[0]);
            formData.append('id', $id);

            this.postUpdateInfo(formData, $id);
        });
    },

    async postUpdateInfo(data, $id)
    {
        await axios.post('/update-info/' + $id, data)
            .then(res =>
            {
                if (res.status === 200)
                {
                    Toast.showToastr();
                    Toast.toastrAddSuccess('Update thông tin thành công!');
                }
            })
            .catch(err =>
            {
                this.handleErrorEdit(err.response.data)
            });
    },

    handleErrorEdit(errors)
    {
        let phone    = errors.phone,
            email    = errors.email;

        if (phone !== undefined)
        {
            let error_phone = this.handelErrorPhone(phone);
            $('#phone-error-server').append(error_phone);
        }

        if (email !== undefined)
        {
            let error_email = this.handelErrorPhone(email);
            $('#email-error-server').append(error_email);
        }
    },

    handelErrorEmail(email)
    {
        let error_email = '';
        email.forEach(value => {
            error_email += '<span class="text-danger" style="font-size: 13px">' + value + '</span>';
        });

        return error_email;
    },

    handelErrorPhone(phone)
    {
        let error_phone = '';
        phone.forEach(value => {
            error_phone += '<span class="text-danger" style="font-size: 13px">' + value + '</span>';
        });

        return error_phone;
    },

    updatePassword()
    {
        $('#btn-update-password').click( () =>
        {
            this.resetFormError();

            let $form = $('#update-password'),
                $id   = $('#user-id').val();

            if (!$form.valid()) return false;

            let formData = new FormData($form[0]);
            formData.append('id', $id);

            this.postUpdatePassword(formData, $id);
        });
    },

    async postUpdatePassword(data, $id)
    {
        await axios.post('/user-password/' + $id, data)
            .then(res =>
            {
                if (res.status === 200)
                {
                    Toast.showToastr();
                    Toast.toastrAddSuccess('Update password thành công!');
                }
            })
            .catch(err =>
            {
                Toast.showToastr();
                Toast.toastrAddSuccess('Update password thất bại!');
            });
    },

    validateForm()
    {
        $.validator.setDefaults({
            debug: true,
            success: "valid"
        });

        $.validator.addMethod(
            "regex",
            function(value, element, regexp) {
                let re = new RegExp(regexp);
                console.log(re);
                return this.optional(element) || re.test(value);
            },
            "Không hợp lệ"
        );

        $('#update-info').validate({
            rules: {
                name: {
                    required: true,
                    minlength: 5,
                    maxlength: 255
                },
                email:{
                    required: true,
                    email:true
                },
                phone: {
                    required: true,
                    maxlength: 10,
                    regex: "^((09|03|07|08|05)+([0-9]{8})\\b)$"
                },
                address: {
                    required: true,
                    minlength: 5,
                    maxlength: 255
                },
                password: {
                    required: true,
                    maxlength: 30,
                    minlength: 6
                },
                password_again: {
                    required: true,
                    maxlength: 30,
                    minlength: 6,
                    equalTo: "#password"
                }
            },
            messages: {
                name: {
                    required: 'Họ tên không được để trống',
                    minlength: 'Họ tên phải có ít nhất 5 kí tự',
                    maxlength: 'Họ tên không được nhiều hơn 255 kí tự'
                },
                email: {
                    required: 'Email không được để trống',
                    email: 'Email không đúng định dạng'
                },
                phone: {
                    required: 'Số điện thoại không được để trống',
                    maxlength: 'Số điện thoại không được nhiều hơn 10 kí tự',
                    regex: 'Số điện thoại không đúng định dạng'
                },
                address: {
                    required: 'Địa chỉ không được để trống',
                    minlength: 'Địa chỉ phải có ít nhất 5 kí tự',
                    maxlength: 'Địa chỉ không được nhiều hơn 255 kí tự'
                },
                password: {
                    required: 'Mật khẩu không được để trống',
                    minlength: 'Mật khẩu phải có ít nhất 6 kí tự',
                    maxlength: 'Mật khẩu không được nhiều hơn 30 kí tự'
                },
                password_again: {
                    required: 'Mật khẩu không được để trống',
                    minlength: 'Mật khẩu phải có ít nhất 6 kí tự',
                    maxlength: 'Mật khẩu không được nhiều hơn 30 kí tự',
                    equalTo: 'Mật khẩu không khớp'
                }
            },
            errorPlacement: function (error, element)
            {
                let placement = $(element).data('error');
                if (placement)
                    $(placement).append(error);
                else
                    error.insertAfter(element);

            },
        });
    },

    validateFormPassword()
    {
        $.validator.setDefaults({
            debug: true,
            success: "valid"
        });

        $('#update-password').validate({
            rules: {
                password: {
                    required: true,
                    maxlength: 30,
                    minlength: 6
                },
                password_again: {
                    required: true,
                    maxlength: 30,
                    minlength: 6,
                    equalTo: "#password"
                }
            },
            messages: {
                password: {
                    required: 'Mật khẩu không được để trống',
                    minlength: 'Mật khẩu phải có ít nhất 6 kí tự',
                    maxlength: 'Mật khẩu không được nhiều hơn 30 kí tự'
                },
                password_again: {
                    required: 'Mật khẩu không được để trống',
                    minlength: 'Mật khẩu phải có ít nhất 6 kí tự',
                    maxlength: 'Mật khẩu không được nhiều hơn 30 kí tự',
                    equalTo: 'Mật khẩu không khớp'
                }
            },
            errorPlacement: function (error, element)
            {
                let placement = $(element).data('error');
                if (placement)
                    $(placement).append(error);
                else
                    error.insertAfter(element);

            },
        });
    },

    resetFormError()
    {
        $('#phone-error-server').html('');
        $('#email-error-server').html('');
    },

    inputFocusResetError()
    {
        $('.input-with-validator input').focus(() =>
        {
            this.resetFormError();
        })
    },

    updateAvatar()
    {
        let that = this;

        $('.avatar-uploader__file-input').change(function ()
        {
            that.readURL(this, $('.avatar-uploader__avatar img'));

            let $id     = $('#user-id').val();
            let file    = document.querySelector('#avatar-update');
            $id         = parseInt($id);

            const formData = new FormData();
            formData.append("id", $id);
            formData.append("avatar", file.files[0]);

            that.postUpdateAvatar($id, formData);
        });
    },

    async postUpdateAvatar(id, data)
    {
        await axios.post('/update-avatar/' + id, data, {
            headers: {
                'Content-Type': 'multipart/form-data;'
            }
        })
            .then((res) =>
            {
                Toast.showToastr();
                Toast.toastrAddSuccess('Update avatar thành công!');
            })
            .catch(err =>
            {
                Toast.showToastr();
                Toast.toastrUpdateError('Update avatar không thành công!');
            });
    },

    readURL(input, ele) {
        if (input.files && input.files[0]) {
            let reader = new FileReader();

            reader.onload = function(e) {
                ele.attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    },

    billCancel()
    {
        let that = this;
        $('.bill-cancel').click(function ()
        {
            let $id_bill = $(this).data('id');

            let data = {
                status: 4
            };

            that.postUpdateBillCancel($id_bill, data, $(this))
        });
    },

    async postUpdateBillCancel(id, data, ele)
    {
        await axios.post('/bill-cancel/' + parseInt(id), data)
            .then((res) =>
            {
                ele.html('Mua lần nữa');
                Toast.showToastr();
                Toast.toastrAddSuccess('Update đơn hàng thành công!');
            })
            .catch(err =>
            {
                Toast.showToastr();
                Toast.toastrUpdateError('Update đơn hàng không thành công!');
            });
    },

    billAgain()
    {
        let that = this;

        $('.bill-again').click(function ()
        {
            let $id_bill = $(this).data('id');

            let data = {
                status: 1
            };

            that.postUpdateBillAgain($id_bill, data, $(this))
        });
    },

    async postUpdateBillAgain(id, data, ele)
    {
        await axios.post('/bill-again/' + parseInt(id), data)
            .then((res) =>
            {
                ele.html('Hủy đơn hàng');
                Toast.showToastr();
                Toast.toastrAddSuccess('Update đơn hàng thành công!');
            })
            .catch(err =>
            {
                Toast.showToastr();
                Toast.toastrUpdateError('Update đơn hàng không thành công!');
            });
    },
};

$(function () {
    User.init();
});
