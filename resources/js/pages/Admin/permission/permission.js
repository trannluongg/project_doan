import axios from 'axios';
import Toastr from '../../../../js/toastr/toastr';
import Loading from '../../../../js/loading/loading';
import select2 from 'select2';

const Permission = {

    init()
    {
        this.getPermissionEdit();
        this.editPermission();
        this.addPermission();
        this.resetFormAddClick();
    },

    getPermissionEdit()
    {
        let that = this;

        $('#permission .edit').click(function () {

            let id = $(this).data('id');

            Loading.loadingShow();

            $('#card-edit').show();
            $('.select2-container').css('width', '100%');

            setTimeout(() => {
                that.getPermission(id);
            }, 500);
        });
    },

    async getPermission(id)
    {
        await axios.get('/admin/permissions/' + id)
            .then(res =>
            {
                Loading.loadingHide();
                let data = res.data.data.data;
                $('#id-permission').val(data.id);
                $('#name-per-edit').val(data.name);
                $('#identifier-per-edit').val(data.identifier_name);
                $('#description-per-edit').val(data.description);
                $('#module-id-permission-edit').val(data.module_id).trigger('change');
            })
            .catch(err =>
            {
                Loading.loadingHide();
            });
    },

    editPermission() {
        let that = this;

        $('#edit-permission').click(function ()
        {
            that.resetEditError();

            let id              = $('#id-permission').val();
            let name            = $('#name-per-edit').val();
            let identifier_name = $('#identifier-per-edit').val();
            let description     = $('#description-per-edit').val();
            let module_id       = $('#module-id-permission-edit').val();

            if (name !== '' && identifier_name !== '' && description !== '')
            {
                let data_put = {
                    id: parseInt(id),
                    name: name,
                    identifier_name: identifier_name,
                    description: description,
                    module_id: module_id
                };
                Loading.loadingShow();
                that.putEditPermission(id, data_put);
            }
        });
    },

    async putEditPermission(id, data)
    {
        let that = this;

        await axios.put('/admin/permissions/' + parseInt(id),  data)
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

    handleErrorEdit(errors)
    {
        let name            = errors.name;
        let identifier_name = errors.identifier_name;
        let description     = errors.description;

        let that = this;

        if (name !== undefined)
        {
            let error_name = that.handelErrorName(name);
            $('#err-per-edit-name').append(error_name);
        }

        if (identifier_name !== undefined)
        {
            let error_identifier_name = that.handelErrorOrder(identifier_name);
            $('#err-per-edit-identifier-name').append(error_identifier_name);
        }

        if (description !== undefined)
        {
            let error_description= that.handelErrorOrder(description);
            $('#err-per-edit-identifier-name').append(error_description);
        }
    },

    addPermission()
    {
        let that = this;

        $('#per-add').click(function ()
        {
            that.resetAddError();

            let name            = $('#name-per-add').val();
            let identifier_name = $('#identifier-per-add').val();
            let description     = $('#description-per-add').val();
            let module_id       = $('#module-id-permission-add').val();

            if (name !== '' && identifier_name !== '' && description !== '')
            {
                let data_post = {
                    name: name,
                    identifier_name: identifier_name,
                    description: description,
                    module_id: module_id
                };

                Loading.loadingShow();
                that.postAddPermission(data_post);
            }

            else{
                alert('Enter the input, not Empty!');
            }
        });
    },

    async postAddPermission(data)
    {
        let that = this;

        await axios.post('/admin/permissions/add',  data)
            .then(() =>
                {
                    that.resetFormAdd();
                    Loading.loadingHide();
                    Toastr.toastrAddSuccess();
                })
            .catch(err =>
            {
                Toastr.toastrAddError();
                Loading.loadingHide();
                that.handelAddPermissionError(err.response.data);
            });
    },

    handelAddPermissionError(errors)
    {
        let name            = errors.name;
        let identifier_name = errors.identifier_name;
        let description     = errors.description;

        let that = this;

        if (name !== undefined)
        {
            let error_name = that.handelErrorName(name);
            $('#err-per-add-name').append(error_name);
        }

        if (identifier_name !== undefined)
        {
            let error_identifier_name = that.handelErrorIdentifierName(identifier_name);
            $('#err-per-add-identifier-name').append(error_identifier_name);
        }

        if (description !== undefined)
        {
            let error_description= that.handelErrorOrder(description);
            $('#err-per-add-identifier-name').append(error_description);
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

    handelErrorIdentifierName(identifier_name)
    {
        let error_identifier_name = '';
        identifier_name.forEach(value => {
            error_identifier_name += '<span class="text-danger" style="font-size: 13px">' + value + '</span>';
        });

        return error_identifier_name;
    },

    handelErrorDescription(description)
    {
        let error_description = '';
        description.forEach(value => {
            error_description += '<span class="text-danger" style="font-size: 13px">' + value + '</span>';
        });

        return error_description;
    },

    resetFormAddClick()
    {
        let that = this;
        $('#per-reset').click(function ()
        {
            that.resetFormAdd();
        });
    },

    resetFormAdd()
    {
        $('#name-per-add').val('');
        $('#identifier-per-add').val('');
        $('#description-per-add').val('');
        $('#module-id-permission-add').val('');

       this.resetAddError();
    },

    resetAddError()
    {
        $('#err-per-add-name').html('');
        $('#err-per-add-identifier-name').html('');
        $('#err-per-add-description').html('');
    },

    resetFormEdit()
    {
        $('#name-per-edit').val('');
        $('#identifier-per-edit').val('');
        $('#description-per-edit').val('');
        $('#module-id-permission-edit').val('');

        this.resetEditError();
    },

    resetEditError()
    {
        $('#err-per-edit-name').html('');
        $('#err-per-edit-identifier-name').html('');
        $('#err-per-edit-description').html('');
    }
};

$(function () {
    $('.select2').select2();
    Permission.init();
});
