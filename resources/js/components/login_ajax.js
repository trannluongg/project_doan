import axios from "axios";
import 'jquery-validation'

const LoginAjax = {
    init()
    {
        this.validateForm();
        this.login();
    },

    login()
    {
        $('.btn-login').click( () =>
        {
            let $form = $('#form-login');

            if (!$form.valid()) return false;

            let formData = new FormData($form[0]);

            this.postLogin(formData);

        });
    },

    async postLogin(data)
    {
        await axios.post('/login', data)
            .then(res =>
            {
                if (res.status === 200)
                {
                    let href = document.location.href;
                    if (href === 'http://doan.abc/cart')
                    {
                        document.location.href = 'http://doan.abc/cart';
                    }
                    else
                    {
                        document.location.href = '/';
                    }

                }
            })
            .catch(err =>
            {
                let status = err.response.status;
                if(status === 401)
                {
                    $('#error-login').html(`<span class="text-danger" style="font-size: 13px">Account is block.</span>`);
                }
                else
                {
                    this.handleErrorEdit(err.response.data);
                }
            });
    },

    validateForm()
    {
        $.validator.setDefaults({
            debug: true,
            success: "valid"
        });

        $('#form-login').validate({
            rules: {
                email:{
                    required: true,
                    email:true
                },
                password: {
                    required: true,
                    maxlength: 30,
                    minlength: 6
                },
            },
            messages: {
                email: {
                    required: 'Email không được để trống',
                    email: 'Email không đúng định dạng'
                },
                password: {
                    required: 'Mật khẩu không được để trống',
                    minlength: 'Mật khẩu phải có ít nhất 6 kí tự',
                    maxlength: 'Mật khẩu không được nhiều hơn 30 kí tự'
                },
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
        let login    = errors.message;

        if (login !== undefined)
        {
            let error_login = this.handelErrorLogin(login);
            $('#error-login').html(error_login);
        }
    },

    handelErrorLogin(login)
    {
        let error_login = '';
        error_login += '<span class="text-danger" style="font-size: 13px">' + login + '</span>';
        return error_login;
    },
};

export default LoginAjax;
