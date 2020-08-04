import axios from 'axios';
import Toastr from '../../../../js/toastr/toastr';
import Loading from '../../../../js/loading/loading';

const Role = {

    init()
    {
        this.getRoleEdit();
        this.editRole();
        this.addRole();
        this.resetFormAddClick();
    },

    getRoleEdit()
    {
        let that = this;

        $('#role .edit').click(function () {

            let id = $(this).data('id');

            Loading.loadingShow();

            $('#card-edit').show();
            $('.select2-container').css('width', '100%');

            setTimeout(() => {
                that.getRole(id);
            }, 500);
        });
    },

    async getRole(id)
    {
        let that = this;

        await axios.get('/admin/roles/' + id)
            .then(res =>
            {
                let data        = res.data.data.data;
                let permissions = data.permissions.data;

                $('#id-role').val(data.id);
                $('#name-rol-edit').val(data.name);
                $('#identifier-rol-edit').val(data.identifier_name);
                $('#description-rol-edit').val(data.description);

                let array_permission = that.handelPermission(permissions);

                $('.check-permission-edit input[type="checkbox"]').each(function()
                {
                    if(array_permission.includes($(this).val()))
                    {
                        $(this).prop('checked', true);
                    }
                    if(array_permission.includes(parseInt($(this).val())))
                    {
                        $(this).prop('checked', true);
                    }
                });
                Loading.loadingHide();

            })
            .catch(err =>
            {
                Loading.loadingHide();
            });
    },

    handelPermission(permissions)
    {
        let array_permission = [];
        permissions.forEach((value) =>
        {
            array_permission.push(value.id, value.name);
        });

        return array_permission;
    },

    editRole() {
        let that = this;

        $('#edit-role').click(function ()
        {
            that.resetErrorEdit();

            let id              = $('#id-role').val();
            let name            = $('#name-rol-edit').val();
            let identifier_name = $('#identifier-rol-edit').val();
            let description     = $('#description-rol-edit').val();
            let permissions      = [];

            $('.check-permission-edit input[type="checkbox"]:checked').each(function() {
                permissions.push($(this).val());
            });

            if (name !== '' && identifier_name !== '' && description !== '')
            {
                let data_put = {
                    id: parseInt(id),
                    name: name,
                    identifier_name: identifier_name,
                    description: description,
                    permissions: permissions
                };
                Loading.loadingShow();
                that.putEditRole(id, data_put);
            }
        });
    },

    async putEditRole(id, data)
    {
        let that = this;

        await axios.put('/admin/roles/' + parseInt(id),  data)
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
            $('#err-rol-edit-name').append(error_name);
        }

        if (identifier_name !== undefined)
        {
            let error_identifier_name = that.handelErrorIdentifierName(identifier_name);
            $('#err-rol-edit-identifier-name').append(error_identifier_name);
        }

        if (description !== undefined)
        {
            let error_description= that.handelErrorDescription(description);
            $('#err-rol-edit-description').append(error_description);
        }
    },

    addRole()
    {
        let that = this;

        $('#rol-add').click(function ()
        {
            that.resetErrorAdd();

            let name            = $('#name-rol-add').val();
            let identifier_name = $('#identifier-rol-add').val();
            let description     = $('#description-rol-add').val();
            let permissions      = [];

            $('.check-permission input[type="checkbox"]:checked').each(function() {
                permissions.push($(this).val());
            });

            if (name !== '' && identifier_name !== '' && description !== '')
            {
                let data_post = {
                    name: name,
                    identifier_name: identifier_name,
                    description: description,
                    permissions: permissions
                };
                Loading.loadingShow();
                that.postAddRole(data_post);
            }

            else{
                alert('Enter the input, not Empty!');
            }
        });
    },

    async postAddRole(data)
    {
        let that = this;

        await axios.post('/admin/roles/add',  data)
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
                that.handelAddRoleError(err.response.data);
            });
    },

    handelAddRoleError(errors)
    {
        let name            = errors.name;
        let identifier_name = errors.identifier_name;
        let description     = errors.description;

        let that = this;

        if (name !== undefined)
        {
            let error_name = that.handelErrorName(name);
            $('#err-rol-add-name').append(error_name);
        }

        if (identifier_name !== undefined)
        {
            let error_identifier_name = that.handelErrorIdentifierName(identifier_name);
            $('#err-rol-add-identifier-name').append(error_identifier_name);
        }

        if (description !== undefined)
        {
            let error_description= that.handelErrorDescription(description);
            $('#err-rol-add-description').append(error_description);
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
        $('#rol-reset').click(function ()
        {
            that.resetFormAdd();
        });
    },

    resetFormAdd()
    {
        $('#name-rol-add').val('');
        $('#identifier-rol-add').val('');
        $('#description-rol-add').val('');
        $('.check-permission input[type="checkbox"]:checked').prop('checked',false);
        this.resetErrorAdd()
    },

    resetErrorAdd()
    {
        $('#err-rol-add-name').html('');
        $('#err-rol-add-identifier-name').html('');
        $('#err-rol-add-description').html('');
    },

    resetFormEdit()
    {
        $('#name-rol-edit').val('');
        $('#identifier-rol-edit').val('');
        $('#description-rol-edit').val('');
        $('.check-permission-edit input[type="checkbox"]:checked').prop('checked',false);
        this.resetErrorEdit();

    },

    resetErrorEdit()
    {
        $('#err-rol-edit-name').html('');
        $('#err-rol-edit-identifier-name').html('');
        $('#err-rol-edit-description').html('');
    }
};

$(function () {
    Role.init();
});
