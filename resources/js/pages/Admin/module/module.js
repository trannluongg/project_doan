import axios from 'axios';
import Toastr from '../../../../js/toastr/toastr';
import Loading from '../../../../js/loading/loading';
import select2 from 'select2';

const Permission = {

    init()
    {
        this.getModuleEdit();
        this.editModule();
        this.addModule();
        this.resetFormAddClick();
        this.addMenuRoute();
        this.editMenuRoute();
        this.removeMenuRoute();
    },

    addMenuRoute()
    {
        $('#add-route').click(function ()
        {
            let data_add = '<div class="row">\n' +
                '                        <div class="form-group col-lg-4">\n' +
                '                            <input type="text" class="form-control" name="menu[]" placeholder="Enter menu name" autocomplete="off" required>\n' +
                '                        </div>\n' +
                '                        <div class="form-group col-lg-4">\n' +
                '                            <input type="text" class="form-control" name="menu_route[]" placeholder="Enter name route" autocomplete="off" required>\n' +
                '                        </div>\n' +
                '                        <div class="form-group col-lg-3">\n' +
                '                            <input type="text" class="form-control" name="permission_route[]" placeholder="Enter permission" autocomplete="off" required>\n' +
                '                        </div>\n' +
                '                        <div class="form-group col-lg-1">\n' +
                '                            <a class="btn btn-danger rm-menu-route text-white">Xóa</a>\n' +
                '                        </div>\n' +
                '                    </div>';
            $('#router-module').append(data_add);
        });
    },

    editMenuRoute()
    {
        $('#edit-route').click(function ()
        {
            let data_add = '<div class="row">\n' +
                '                        <div class="form-group col-lg-4">\n' +
                '                            <input type="text" class="form-control" name="menu_edit[]" placeholder="Enter menu name" autocomplete="off" required>\n' +
                '                        </div>\n' +
                '                        <div class="form-group col-lg-4">\n' +
                '                            <input type="text" class="form-control" name="menu_route_edit[]" placeholder="Enter name route" autocomplete="off" required>\n' +
                '                        </div>\n' +
                '                        <div class="form-group col-lg-3">\n' +
                '                            <input type="text" class="form-control" name="permission_route_edit[]" placeholder="Enter permission" autocomplete="off" required>\n' +
                '                        </div>\n' +
                '                        <div class="form-group col-lg-1">\n' +
                '                            <a class="btn btn-danger rm-menu-route text-white">Xóa</a>\n' +
                '                        </div>\n' +
                '                    </div>';
            $('#edit-router-module').append(data_add);
        });
    },

    removeMenuRoute()
    {
        $(document).on('click', '.rm-menu-route', function ()
        {
            $(this).parent().parent().remove();
        });
    },

    getModuleEdit()
    {
        let that = this;

        $('#module .edit').click(function ()
        {
            let id = $(this).data('id');

            Loading.loadingShow();

            $('#card-edit').show();
            $('.select2-container').css('width', '100%');

            setTimeout(() => {
                that.getModule(id);
            }, 500);
        });

    },

    async getModule(id)
    {
        await axios.get('/admin/modules/' + id)
            .then(res =>
            {
                Loading.loadingHide();
                let data = res.data.data.data;
                $('#module-id-edit').val(data.id);
                $('#name-mod-edit').val(data.name);
                $('#order-mod-edit').val(data.order);
                $('#icon-mod-edit').val(data.icon);

                let menu = data.menu;
                let menu_route = data.menu_route;
                let menu_permission = data.menu_permission;

                menu.forEach((value, index) => {
                    let data_html = '<div class="row">\n' +
                        '                        <div class="form-group col-lg-4">\n' +
                        '                            <input type="text" class="form-control" name="menu_edit[]" placeholder="Enter menu name" autocomplete="off" value="' + menu[index] + '" required>\n' +
                        '                        </div>\n' +
                        '                        <div class="form-group col-lg-4">\n' +
                        '                            <input type="text" class="form-control" name="menu_route_edit[]" placeholder="Enter name route" autocomplete="off" value="' + menu_route[index] + '" required>\n' +
                        '                        </div>\n' +
                        '                        <div class="form-group col-lg-3">\n' +
                        '                            <input type="text" class="form-control" name="permission_route_edit[]" placeholder="Enter permission" autocomplete="off" value="' + menu_permission[index] + '" required>\n' +
                        '                        </div>\n' +
                        '                        <div class="form-group col-lg-1">\n' +
                        '                            <a class="btn btn-danger rm-menu-route text-white">Xóa</a>\n' +
                        '                        </div>\n' +
                        '                    </div>';

                    $('#edit-router-module').append(data_html);
                });

                $('#per-id-mod-edit').val(data.permission).trigger('change');
                $('#mog-id-mod-edit').val(data.module_group).trigger('change');

            })
            .catch(err =>
            {
                Loading.loadingHide();
            });
    },

    editModule() {
        let that = this;

        $('#edit-module').click(function ()
        {
            that.resetEditError();

            let id              = $('#module-id-edit').val();
            let name            = $('#name-mod-edit').val();
            let permission      = $('#per-id-mod-edit option:selected').data('id');
            let icon            = $('#icon-mod-edit').val();
            let module_group    = $('#mog-id-mod-edit').val();
            let order           = $('#order-mod-edit').val();
            let menu            = [];
            let menu_route      = [];
            let permission_route= [];

            $('input[name="menu_edit[]"]').each(function() {
                menu.push($(this).val());
            });

            $('input[name="menu_route_edit[]"]').each(function() {
                menu_route.push($(this).val());
            });

            $('input[name="permission_route_edit[]"]').each(function() {
                permission_route.push($(this).val());
            });

            if (name !== '' && icon !== '' && order !== '')
            {
                let data = {
                    id:parseInt(id),
                    name : name,
                    icon : icon,
                    order: parseInt(order),
                    menu: menu,
                    menu_route: menu_route,
                    menu_permission: permission_route,
                    module_group: parseInt(module_group),
                    permission: permission
                };
                Loading.loadingShow();
                that.putEditModule(id, data);
            }
            else{
                alert('Enter the input, not Empty!');
            }
        });
    },

    async putEditModule(id, data)
    {
        let that = this;

        await axios.put('/admin/modules/' + parseInt(id),  data)
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
        let name    = errors.name;
        let icon    = errors.icon;
        let order   = errors.order;

        let that = this;

        if (name !== undefined)
        {
            let error_name = that.handelErrorName(name);
            $('#err-mod-edit-name').append(error_name);
        }

        if (icon !== undefined)
        {
            let error_icon = that.handelErrorIcon(icon);
            $('#err-mod-edit-icon').append(error_icon);
        }

        if (order !== undefined)
        {
            let error_order= that.handelErrorOrder(order);
            $('#err-mod-edit-order').append(error_order);
        }
    },

    addModule()
    {
        let that = this;

        $('#mod-add').click(function ()
        {
            that.resetAddError();

            let name            = $('#name-mod-add').val();
            let permission      = $('#per-id-mod-add').val();
            let icon            = $('#icon-mod-add').val();
            let module_group    = $('#mog-id-mod-add').val();
            let order           = $('#order-mod-add').val();
            let menu            = [];
            let menu_route      = [];
            let permission_route= [];

            $('input[name="menu[]"]').each(function() {
                menu.push($(this).val());
            });

            $('input[name="menu_route[]"]').each(function() {
                menu_route.push($(this).val());
            });

            $('input[name="permission_route[]"]').each(function() {
                permission_route.push($(this).val());
            });

            if (name !== '' && icon !== '' && order !== '')
            {
                let data = {
                    name : name,
                    icon : icon,
                    order: parseInt(order),
                    menu: menu,
                    menu_route: menu_route,
                    menu_permission: permission_route,
                    module_group: parseInt(module_group),
                    permission: parseInt(permission)
                };

                Loading.loadingShow();
                that.postAddModule(data);
            }
            else{
                alert('Enter the input, not Empty!');
            }
        });
    },

    async postAddModule(data)
    {
        let that = this;

        await axios.post('/admin/modules/add',  data)
            .then(() =>
            {
                that.resetFormAdd();
                Loading.loadingHide();
                Toastr.toastrAddSuccess();
            })
            .catch(err =>
            {
                Loading.loadingHide();
                Toastr.toastrAddError();
                that.handelAddModuleError(err.response.data)
            });
    },

    handelAddModuleError(errors)
    {
        let name    = errors.name;
        let icon    = errors.icon;
        let order   = errors.order;

        let that = this;

        if (name !== undefined)
        {
            let error_name = that.handelErrorName(name);
            $('#err-mod-add-name').append(error_name);
        }

        if (icon !== undefined)
        {
            let error_icon = that.handelErrorIcon(icon);
            $('#err-mod-add-icon').append(error_icon);
        }

        if (order !== undefined)
        {
            let error_order= that.handelErrorOrder(order);
            $('#err-mod-add-order').append(error_order);
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

    handelErrorIcon(icons)
    {
        let error_icon = '';
        icons.forEach(value => {
            error_icon += '<span class="text-danger" style="font-size: 13px">' + value + '</span>';
        });

        return error_icon;
    },

    handelErrorOrder(orders)
    {
        let error_order = '';
        orders.forEach(value => {
            error_order += '<span class="text-danger" style="font-size: 13px">' + value + '</span>';
        });

        return error_order;
    },

    resetFormAddClick()
    {
        let that = this;
        $('#reset-mod').click(function ()
        {
            that.resetFormAdd();
        });
    },

    resetFormAdd()
    {
        $('#name-mod-add').val('');
        $('#per-id-mod-add').val('');
        $('#icon-mod-add').val('');
        $('#mog-id-mod-add').val('');
        $('#order-mod-add').val('');

        let data = '<div class="row">\n' +
            '                        <div class="form-group col-lg-4">\n' +
            '                            <input type="text" class="form-control" name="menu[]" placeholder="Enter menu name" autocomplete="off" required>\n' +
            '                        </div>\n' +
            '                        <div class="form-group col-lg-4">\n' +
            '                            <input type="text" class="form-control" name="menu_route[]" placeholder="Enter name route" autocomplete="off" required>\n' +
            '                        </div>\n' +
            '                        <div class="form-group col-lg-3">\n' +
            '                            <input type="text" class="form-control" name="permission_route[]" placeholder="Enter permission" autocomplete="off" required>\n' +
            '                        </div>\n' +
            '                    </div>';
        $('#router-module').html(data);

        this.resetAddError();
    },

    resetAddError()
    {
        $('#err-mod-add-name').html('');
        $('#err-mod-add-icon').html('');
        $('#err-mod-add-order').html('');
    },

    resetFormEdit()
    {
        $('#name-mod-edit').val('');
        $('#per-id-mod-edit').val('');
        $('#icon-mod-edit').val('');
        $('#mog-id-mod-edit').val('');
        $('#order-mod-edit').val('');

        $('#edit-router-module').html('');

        this.resetEditError();
    },

    resetEditError()
    {
        $('#err-mod-edit-name').html('');
        $('#err-mod-edit-icon').html('');
        $('#err-mod-edit-order').html('');
    }
};

$(function () {
    $('.select2').select2();
    dragula([document.getElementById('router-module')]);
    Permission.init();
});
