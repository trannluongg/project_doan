import axios from 'axios';
import Toastr from '../../../../js/toastr/toastr';
import Loading from '../../../../js/loading/loading';


const Brand = {

    init() {
        this.addBrand();
        this.getBrandEdit();
        this.editBrand();
        this.resetFormAddClick();
    },

    getBrandEdit() {
        let that = this;

        $('#brand .edit').click(function ()
        {
            let id = $(this).data('id');

            Loading.loadingShow();

            $('#card-edit').show();

            setTimeout(() => {
                that.getBrand(id);
            }, 500);
        });

    },

    async getBrand(id) {
        await axios.get('/admin/brands/' + id)
            .then(res =>
            {
                Loading.loadingHide();
                let data = res.data.data.data;
                $('#brand-id').val(data.id);
                $('#name-bra-edit').val(data.name);
                $('#icon-bra-edit').val(data.icon);
                $('#slug-bra-edit').val(data.slug);

            })
            .catch(err =>
            {
                Loading.loadingHide();
            });
    },


    editBrand() {
        let that = this;

        $('#edit-brand').click(function ()
        {
            that.resetEditError();

            let id              = $('#brand-id').val();
            let name            = $('#name-bra-edit').val();
            let icon            = $('#icon-bra-edit').val();
            let slug            = $('#slug-bra-edit').val();

            if (name !== '')
            {
                let data = {
                    id: parseInt(id),
                    name: name,
                    icon: icon,
                    slug: slug
                };

                Loading.loadingShow();
                that.putEditBrand(id, data);
            }
            else{
                alert('Enter the input, not Empty!');
            }
        });
    },

    async putEditBrand(id, data) {
        let that = this;

        await axios.post('/admin/brands/' + parseInt(id), data)
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
        let name    = errors.name;

        let that = this;

        if (name !== undefined)
        {
            let error_name = that.handelErrorName(name);
            $('#err-bra-edit-name').append(error_name);
        }
    },

    addBrand()
    {
        let that = this;

        $('#bra-add').click(function ()
        {
            that.resetAddError();

            let name    = $('#name-bra-add').val();
            let icon    = $('#icon-bra-add').val();
            let slug    = $('#slug-bra-add').val();

            if (name !== '')
            {
                let data = {
                    name: name,
                    icon: icon,
                    slug: slug
                };

                Loading.loadingShow();
                that.postAddBrand(data);
            }
            else{
                alert('Enter the input, not Empty!');
            }
        });
    },

    async postAddBrand(data)
    {
        let that = this;

        await axios.post('/admin/brands/add',  data)
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
                that.handelAddBrandError(err.response.data)
            });
    },

    handelAddBrandError(errors)
    {
        let name    = errors.name;

        let that = this;

        if (name !== undefined) {
            let error_name = that.handelErrorName(name);
            $('#err-bra-add-name').append(error_name);
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

    resetFormAddClick()
    {
        let that = this;
        $('#bra-reset').click(function ()
        {
            that.resetFormAdd();
        });
    },

    resetFormAdd()
    {
        $('#name-bra-add').val('');
        $('#icon-bra-add').val('');
        $('#slug-bra-add').val('');
        this.resetAddError()
    },

    resetAddError()
    {
        $('#err-bra-add-name').html('');
    },

    resetFormEdit()
    {
        $('#name-bra-edit').val('');
        $('#icon-bra-edit').val('');
        $('#slug-bra-edit').val('');
        this.resetEditError();
    },

    resetEditError()
    {
        $('#err-bra-edit-name').html('');
    },

};

$(function () {
    Brand.init();
});
