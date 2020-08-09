import axios from 'axios';
import Toastr from '../../../../js/toastr/toastr';
import Loading from '../../../../js/loading/loading';

const AccUser = {

    init() {
        this.previewImage();
        this.addAccUser();
        this.getAccUserEdit();
        this.editAccUser();
        this.editAvatarUser();
        this.resetFormAddClick();
        this.getAvatarUserEdit();
    },

    getAccUserEdit()
    {
        let that = this;
        $('#acc-user .edit').click(function()
        {
            let id =  $(this).data('id');

            Loading.loadingShow();

            $('#card-edit').show();

            setTimeout(() => {
                that.getAccUser(id);
            }, 500);
        });
    },

    async getAccUser(id)
    {
        await axios.get('/admin/acc-user/' + id)
            .then(res =>
            {
                Loading.loadingHide();
                let data = res.data.data.data;

                $('#acc-user-id').val(data.id);
                $('#name-acc-edit').val(data.name);
                $('#email-acc-edit').val(data.email);
                $('#phone-acc-edit').val(data.phone);
                $('#address-acc-edit').val(data.address);
                $('#gender-acc-edit').val(data.gender).trigger('change');
                $('.date-of-birth-edit').val(data.date_of_birth);
                $('#status-acc-edit').val(data.status).trigger('change');

            })
            .catch(err =>
            {
                Loading.loadingHide();
            });
    },

    editAccUser()
    {
        $('#edit-acc-user').click(() =>
        {
            let id                  = $('#acc-user-id').val();
            let name                = $('#name-acc-edit').val();
            let email               = $('#email-acc-edit').val();
            let phone               = $('#phone-acc-edit').val();
            let address             = $('#address-acc-edit').val();
            let date_of_birth       = $('.date-of-birth-edit').val();
            let gender              = $('#gender-acc-edit').val();
            let status              = $('#status-acc-edit').val();

            id                      = parseInt(id);

            if (name !== '' && email !== '' && phone !== '' && address !== '' && date_of_birth !== '')
            {
                let formData = this.handelFormData(name, email, phone, address, date_of_birth, gender);
                formData.append("id", id);
                formData.append("status", status);

                Loading.loadingShow();
                this.putEditAccUser(id, formData);
            }
            else{
                alert('Enter the input, not Empty!');
            }

        });
    },

    async putEditAccUser(id, data)
    {
        await axios.post('/admin/acc-user/' + parseInt(id),  data)
            .then(() =>
            {
                $('#card-edit').hide();
                this.resetFormEdit();
                Loading.loadingHide();
                Toastr.showToastr();
                Toastr.toastrUpdateSuccess();
            })
            .catch(err =>
            {
                Loading.loadingHide();
                Toastr.toastrUpdateError();
                this.handleErrorEdit(err.response.data);
            });
    },

    handleErrorEdit(errors)
    {
        let name                = errors.name;
        let email               = errors.email;
        let phone               = errors.phone;
        let address             = errors.address;
        let date_of_birth       = errors.date_of_birth;

        if (name !== undefined) {
            let error_name = this.handelErrorName(name);
            $('#err-acc-edit-name').append(error_name);
        }

        if (email !== undefined) {
            let error_email = this.handelErrorEmail(email);
            $('#err-acc-edit-email').append(error_email);
        }

        if (phone !== undefined) {
            let error_phone = this.handelErrorPhone(phone);
            $('#err-acc-edit-phone').append(error_phone);
        }

        if (address !== undefined) {
            let error_address = this.handelErrorAddress(address);
            $('#err-acc-edit-address').append(error_address);
        }

        if (date_of_birth !== undefined) {
            let error_date_of_birth = this.handelErrorDateOfBirth(date_of_birth);
            $('#err-acc-edit-dob').append(error_date_of_birth);
        }
    },

    getAvatarUserEdit()
    {
        let that = this;

        $('#acc-user .edit-avatar').click(function ()
        {
            let id = $(this).data('id');

            Loading.loadingShow();

            $('#card-edit-avatar').show();

            setTimeout(() => {
                that.getAvatarUser(id);
            }, 500);
        })
    },

    async getAvatarUser(id)
    {
        await axios.get('/admin/acc-user/avatar/' + id)
            .then(res =>
            {
                Loading.loadingHide();
                let data = res.data.data.data;
                $('#acc-user-id-avatar').val(data.id);
                $('#image-preview-acc-edit img').attr('src', 'http://doan.abc/upload/avatar/' + data.avatar);

            })
            .catch(err =>
            {
                Loading.loadingHide();
            });
    },

    editAvatarUser()
    {
        $('#edit-avatar-acc-user').click(() =>
        {
            this.resetEditErrorEdit();

            let id      = $('#acc-user-id-avatar').val();
            let file    = document.querySelector('#image-acc-edit');
            id = parseInt(id);

            const formData = new FormData();
            formData.append("id", id);
            formData.append("avatar", file.files[0]);

            Loading.loadingShow();
            this.putEditAvatarUser(id, formData);
        });
    },

    async putEditAvatarUser(id, data)
    {
        await axios.post('/admin/acc-user/avatar/' + parseInt(id), data, {
            headers: {
                'Content-Type': 'multipart/form-data;'
            }
        })
            .then((res) =>
            {
                Loading.loadingHide();
                if (res.data.status_code === 422)
                {
                    this.handleErrorEditAvatar(res.data);
                }
                else{
                    $('#card-edit-avatar').hide();
                    this.resetFormEdit();
                    Toastr.showToastr();
                    Toastr.toastrUpdateSuccess();
                }
            })
            .catch(err =>
            {
                Loading.loadingHide();
                Toastr.toastrUpdateError();
                this.handleErrorEditAvatar(err.response.data);
            });
    },

    handleErrorEditAvatar(errors)
    {
        let avatar    = errors.avatar;

        if (avatar !== undefined)
        {
            let error_avatar = this.handelErrorAvatar(avatar);
            $('#err-image-preview-acc-edit').append(error_avatar);
        }
    },

    addAccUser()
    {
        $('#acc-add').click(() =>
        {
            this.resetAddError();

            let name                = $('#name-acc-add').val();
            let email               = $('#email-acc-add').val();
            let phone               = $('#phone-acc-add').val();
            let address             = $('#address-acc-add').val();
            let password            = $('#password-acc-add').val();
            let password_confirm    = $('#password-confirm-acc-add').val();
            let date_of_birth       = $('.date-of-birth').val();
            let gender              = $('#gender-acc-add').val();
            let file                = document.querySelector('#image-acc-add');

            if (name !== '' && email !== '' && phone !== '' && address !== '' && password !== '' && password_confirm !== '' && date_of_birth !== '')
            {
                let formData = this.handelFormData(name, email, phone, address, date_of_birth, gender);
                formData.append("avatar", file.files[0]);
                formData.append("password", password);
                formData.append("password_confirm", password_confirm);

                Loading.loadingShow();
                this.postAddAccUser(formData);
            }
            else{
                alert('Enter the input, not Empty!');
            }
        });
    },

    async postAddAccUser(data)
    {
        await axios.post('/admin/acc-user/add',  data, {
            headers: {
                'Content-Type': 'multipart/form-data;'
            }
        })
            .then(() =>
            {
                this.resetFormAdd();
                Loading.loadingHide();
                Toastr.toastrAddSuccess();
            })
            .catch(err =>
            {
                Loading.loadingHide();
                Toastr.toastrAddError();
                this.handelAddUserError(err.response.data)
            });
    },

    handelAddUserError(errors)
    {
        let name                = errors.name;
        let email               = errors.email;
        let phone               = errors.phone;
        let address             = errors.address;
        let password            = errors.password;
        let password_confirm    = errors.password_confirm;
        let date_of_birth       = errors.date_of_birth;
        let avatar              = errors.avatar;

        if (name !== undefined) {
            let error_name = this.handelErrorName(name);
            $('#err-acc-add-name').append(error_name);
        }

        if (email !== undefined) {
            let error_email = this.handelErrorEmail(email);
            $('#err-acc-add-email').append(error_email);
        }

        if (phone !== undefined) {
            let error_phone = this.handelErrorPhone(phone);
            $('#err-acc-add-phone').append(error_phone);
        }

        if (address !== undefined) {
            let error_address = this.handelErrorAddress(address);
            $('#err-acc-add-address').append(error_address);
        }

        if (password !== undefined) {
            let error_password = this.handelErrorPassword(password);
            $('#err-acc-add-password').append(error_password);
        }

        if (password_confirm !== undefined) {
            let error_password_confirm = this.handelErrorPasswordConfirm(password_confirm);
            $('#err-acc-add-password-confirm').append(error_password_confirm);
        }

        if (date_of_birth !== undefined) {
            let error_date_of_birth = this.handelErrorDateOfBirth(date_of_birth);
            $('#err-acc-add-dob').append(error_date_of_birth);
        }
        if (avatar !== undefined) {
            let error_avatar = this.handelErrorAvatar(avatar);
            $('#err-image-preview-acc').append(error_avatar);
        }
    },

    handelErrorName(name) {
        let error_name = '';
        name.forEach(value => {
            error_name += '<span class="text-danger" style="font-size: 13px">' + value + '</span>';
        });

        return error_name;
    },

    handelErrorEmail(email) {
        let error_email = '';
        email.forEach(value => {
            error_email += '<span class="text-danger" style="font-size: 13px">' + value + '</span>';
        });

        return error_email;
    },

    handelErrorPhone(phone) {
        let error_phone = '';
        phone.forEach(value => {
            error_phone += '<span class="text-danger" style="font-size: 13px">' + value + '</span>';
        });

        return error_phone;
    },

    handelErrorDateOfBirth(date_of_birth) {
        let error_date_of_birth= '';
        date_of_birth.forEach(value => {
            error_date_of_birth += '<span class="text-danger" style="font-size: 13px">' + value + '</span>';
        });

        return error_date_of_birth;
    },

    handelErrorAddress(address) {
        let error_address = '';
        address.forEach(value => {
            error_address += '<span class="text-danger" style="font-size: 13px">' + value + '</span>';
        });

        return error_address;
    },

    handelErrorPassword(password) {
        let error_password = '';
        password.forEach(value => {
            error_password += '<span class="text-danger" style="font-size: 13px">' + value + '</span>';
        });

        return error_password;
    },

    handelErrorPasswordConfirm(password_confirm) {
        let error_password_confirm = '';
        password_confirm.forEach(value => {
            error_password_confirm += '<span class="text-danger" style="font-size: 13px">' + value + '</span>';
        });

        return error_password_confirm;
    },

    handelErrorAvatar(avatar) {
        let error_avatar = '';
        avatar.forEach(value => {
            error_avatar += '<span class="text-danger" style="font-size: 13px">' + value + '</span>';
        });

        return error_avatar;
    },

    handelFormData(name, email, phone, address, date_of_birth, gender)
    {
        const formData = new FormData();

        formData.append("name", name);
        formData.append("email", email);
        formData.append("phone", phone);
        formData.append("address", address);
        formData.append("date_of_birth", date_of_birth);
        formData.append("gender", gender);

        return formData;
    },


    resetFormAddClick()
    {
        $('#acc-reset').click( () =>
        {
            this.resetFormAdd();
        });
    },

    resetFormAdd()
    {
        $('#name-acc-add').val('');
        $('#email-acc-add').val('');
        $('#phone-acc-add').val('');
        $('.date-of-birth').val('');
        $('#address-acc-add').val('');
        $('#password-acc-add').val('');
        $('#password-confirm-acc-add').val('');
        $('#image-acc-add').val('');
        $('#image-preview-acc img').attr('src', '');
        this.resetAddError();
    },

    resetAddError()
    {
        $('#err-acc-add-name').html('');
        $('#err-acc-add-email').html('');
        $('#err-acc-add-phone').html('');
        $('#err-acc-add-address').html('');
        $('#err-acc-add-dob').html('');
        $('#err-acc-add-password').html('');
        $('#err-acc-add-password-confirm').html('');
        $('#err-image-preview-acc').html('');
    },


    resetFormEdit()
    {
        $('#name-acc-edit').val('');
        $('#email-acc-edit').val('');
        $('#phone-acc-edit').val('');
        $('.date-of-birth-edit').val('');
        $('#address-acc-edit').val('');
        $('#role-acc-edit').val('');
        $('#password-acc-edit').val('');
        $('#password-confirm-acc-edit').val('');
        this.resetEditError();
    },

    resetFormEditAvatar()
    {
        $('#image-acc-edit').val('');
        $('#image-preview-acc-edit img').attr('src', '');
        this.resetEditErrorEdit();
    },

    resetEditError()
    {
        $('#err-acc-edit-name').html('');
        $('#err-acc-edit-email').html('');
        $('#err-acc-edit-phone').html('');
        $('#err-acc-edit-address').html('');
        $('#err-acc-edit-dob').html('');
        $('#err-acc-edit-password').html('');
        $('#err-acc-edit-password-confirm').html('');
        $('#err-image-preview-acc-edit').html('');
    },

    resetEditErrorEdit()
    {
        $('#err-image-preview-acc-edit').html('');
    },

    previewImage()
    {
        let that = this;
        $('#image-acc-add').change(function ()
        {
            that.readURL(this, $('#image-preview-acc img'));

        });

        $('#image-acc-edit').change(function ()
        {
            that.readURL(this, $('#image-preview-acc-edit img'));

        })
    },

    readURL(input, ele)
    {
        if (input.files && input.files[0])
        {
            let reader = new FileReader();

            reader.onload = function(e)
            {
                ele.attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
};

$(function () {
    AccUser.init();
});
