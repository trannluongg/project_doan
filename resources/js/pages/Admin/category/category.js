import axios from 'axios';
import Toastr from '../../../../js/toastr/toastr';
import Loading from '../../../../js/loading/loading';


const Category = {

    init() {
        this.addCategory();
        this.getCategoryEdit();
        this.editCategory();
        this.resetFormAddClick();
    },

    getCategoryEdit()
    {
        let that = this;

        $('#category .edit').click(function ()
        {
            let id = $(this).data('id');

            Loading.loadingShow();

            $('#card-edit').show();

            setTimeout(() => {
                that.getCategory(id);
            }, 500);
        });
    },

    async getCategory(id)
    {
        await axios.get('/admin/category/' + id)
            .then(res =>
            {
                Loading.loadingHide();
                let data = res.data.data.data;
                $('#category-id').val(data.id);
                $('#name-cat-edit').val(data.name);

            })
            .catch(err =>
            {
                Loading.loadingHide();
            });
    },


    editCategory()
    {
        let that = this;

        $('#edit-category').click(function ()
        {
            that.resetEditError();

            let id              = $('#category-id').val();
            let name            = $('#name-cat-edit').val();

            if (name !== '')
            {
                let data = {
                    id: parseInt(id),
                    name: name
                };

                Loading.loadingShow();
                that.putEditCategory(id, data);
            }
            else{
                alert('Enter the input, not Empty!');
            }
        });
    },

    async putEditCategory(id, data)
    {
        let that = this;

        await axios.post('/admin/category/' + parseInt(id), data)
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

        let that = this;

        if (name !== undefined)
        {
            let error_name = that.handelErrorName(name);
            $('#err-cat-edit-name').append(error_name);
        }
    },

    addCategory()
    {
        let that = this;

        $('#cat-add').click(function ()
        {
            that.resetAddError();

            let name    = $('#name-cat-add').val();

            if (name !== '')
            {
                let data = {
                    name: name
                };

                Loading.loadingShow();
                that.postAddCategory(data);
            }
            else{
                alert('Enter the input, not Empty!');
            }
        });
    },

    async postAddCategory(data)
    {
        let that = this;

        await axios.post('/admin/category/add',  data)
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
                that.handelAddCategoryError(err.response.data)
            });
    },

    handelAddCategoryError(errors)
    {
        let name    = errors.name;

        let that = this;

        if (name !== undefined) {
            let error_name = that.handelErrorName(name);
            $('#err-cat-add-name').append(error_name);
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
        $('#cat-reset').click(function ()
        {
            that.resetFormAdd();
        });
    },

    resetFormAdd()
    {
        $('#name-cat-add').val('');
        this.resetAddError();
    },

    resetAddError()
    {
        $('#err-cat-add-name').html('');
    },

    resetFormEdit()
    {
        $('#name-cat-edit').val('');
        this.resetEditError();
    },

    resetEditError()
    {
        $('#err-cat-edit-name').html('');
    }

};

$(function () {
    Category.init();
});
