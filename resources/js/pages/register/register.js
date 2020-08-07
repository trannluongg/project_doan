import SidebarMenu from "../../components/sidebar_mobile";
import 'jquery-validation'
import axios from 'axios';
import AjaxSearch from "../../components/ajax_search_product";
import ShowCart from "../../components/show_cart";

const Register = {
    init()
    {
        SidebarMenu.init();
        this.validateForm();
        this.register();
        this.inputFocusResetError();
        AjaxSearch.init();
        ShowCart.init();
    },

    register()
    {
        $('.btn-register').click( () =>
        {
            this.resetFormError();

            let $form = $('#form-register');

            if (!$form.valid()) return false;

            let formData = new FormData($form[0]);

            this.postRegister(formData);

        });
    },

    async postRegister(data)
    {
        await axios.post('/register', data)
            .then(res =>
            {
                if (res.status === 200)
                {
                    document.location.href="/";
                }
            })
            .catch(err =>
            {
                this.handleErrorEdit(err.response.data)
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

        $('#form-register').validate({
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

    resetFormError()
    {
        $('#phone-error-server').html('');
        $('#email-error-server').html('');
    },

    inputFocusResetError()
    {
        $('.mod-input input').focus(() =>
        {
            this.resetFormError();
        })
    }
};

$(function () {
    Register.init();
});
