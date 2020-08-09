import axios from 'axios';
import Toastr from '../../../../js/toastr/toastr';
import Loading from '../../../../js/loading/loading';

const ModuleGroup = {
    init()
    {
        this.getModuleGroupEdit();
        this.editModuleGroup();
        this.addModuleGroup();
        this.resetFormAddClick();
    },

    getModuleGroupEdit()
    {
        let that = this;
        $('#module-group .edit').click(function ()
        {
            let id = $(this).data('id');

            Loading.loadingShow();

            $('#card-edit').show();

            setTimeout(() => {
                that.getModuleGroup(id);
            }, 500);
        });
    },

    async getModuleGroup(id)
    {
        await axios.get('/admin/module-group/' + id)
            .then(res =>
            {
                Loading.loadingHide();
                let data = res.data.data.data;
                $('#id-module-group').val(data.id);
                $('#name-module-group').val(data.name);
                $('#order-module-group').val(data.order);
            })
            .catch(err =>
            {
                Loading.loadingHide();
            });
    },

    editModuleGroup()
    {
        let that = this;

        $('#edit-module-group').click(function ()
        {
            that.resetEditError();

            let id = $('#id-module-group').val();
            let name = $('#name-module-group').val();
            let order = $('#order-module-group').val();

            if (name !== '' && order !== '')
            {
                let data_put = {
                    id: id,
                    name: name,
                    order: parseInt(order)
                };
                Loading.loadingShow();
                that.putEditModuleGroup(id, data_put);
            }
        });
    },

    async putEditModuleGroup(id, data)
    {
        let that = this;
        await axios.put('/admin/module-group/' + parseInt(id),  data)
            .then(() =>
            {
                that.resetFormEdit();
                Loading.loadingHide();
                Toastr.showToastr();
                Toastr.toastrUpdateSuccess();
                $('#card-edit').hide();
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
        let name = errors.name;
        let order = errors.order;
        let that = this;

        if (name !== undefined)
        {
            let error_name = that.handelErrorName(name);
            $('#error-mg-name').append(error_name);
        }

        if (order !== undefined)
        {
            let error_order = that.handelErrorOrder(order);
            $('#error-mg-order').append(error_order);
        }
    },

    addModuleGroup()
    {
        let that = this;
        $('#mg-add').click(function ()
        {
            that.resetAddError();

            let name = $('#name-mg-add').val();
            let order = $('#order-mg-add').val();

            if (name !== '' && order !== '')
            {
                let data_post = {
                    name: name,
                    order: parseInt(order)
                };
                Loading.loadingShow();
                that.postAddModuleGroup(data_post);
            }
            else{
                alert('Enter the input, not Empty!');
            }
        });
    },

    async postAddModuleGroup(data)
    {
        let that = this;

        await axios.post('/admin/module-group/add',  data)
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
                that.handelAddModuleGroupError(err.response.data);
            });
    },

    handelAddModuleGroupError(errors)
    {
        let name = errors.name;
        let order = errors.order;
        let that = this;

        if (name !== undefined)
        {
            let error_name = that.handelErrorName(name);
            $('#err-mg-add-name').append(error_name);
        }

        if (order !== undefined)
        {
            let error_order = that.handelErrorOrder(order);
            $('#err-mg-add-order').append(error_order);
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

    handelErrorOrder(order)
    {
        let error_order = '';
        order.forEach(value => {
            error_order += '<span class="text-danger" style="font-size: 13px">' + value + '</span>';
        });

        return error_order;
    },

    resetFormAddClick()
    {
        let that = this;
        $('#mg-reset').click(function ()
        {
           that.resetFormAdd();
        });
    },

    resetFormAdd()
    {
        $('#name-mg-add').val('');
        $('#order-mg-add').val('');

        this.resetAddError();
    },

    resetAddError()
    {
        $('#err-mg-add-name').html('');
        $('#err-mg-add-order').html('');
    },

    resetFormEdit()
    {
        $('#name-module-group').val('');
        $('#order-module-group').val('');

        this.resetEditError();
    },

    resetEditError()
    {
        $('#error-mg-name').html('');
        $('#error-mg-order').html('')
    }
};

$(function () {
    ModuleGroup.init();
});
