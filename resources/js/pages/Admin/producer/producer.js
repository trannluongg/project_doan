import axios from 'axios';
import Toastr from '../../../../js/toastr/toastr';
import Loading from '../../../../js/loading/loading';


const Producer = {

    init() {
        this.previewImage();
        this.addModule();
        this.getProducerEdit();
        this.editProducer();
    },

    getProducerEdit()
    {
        let that = this;

        $('#producer .edit').click(function ()
        {
            let id = $(this).data('id');

            Loading.loadingShow();

            $('#card-edit').show();

            setTimeout(() => {
                that.getProducer(id);
            }, 500);
        });

    },

    async getProducer(id)
    {
        await axios.get('/admin/producers/' + id)
            .then(res =>
            {
                Loading.loadingHide();
                let data = res.data.data.data;
                $('#producer-id').val(data.id);
                $('#name-prd-edit').val(data.name);
                $('#image-preview-edit img').attr('src', 'http://doan.abc/upload/prducer/'. data.avatar);

            })
            .catch(err =>
            {
                Loading.loadingHide();
            });
    },

    editProducer() {
        let that = this;

        $('#edit-producer').click(function ()
        {
            that.resetEditError();

            let id              = $('#producer-id').val();
            let name            = $('#name-prd-edit').val();
            let file            = document.querySelector('#avatar-prd-edit');

            if (name !== '')
            {
                const formData = new FormData();

                id = parseInt(id);

                formData.append("id", id);
                formData.append("avatar", file.files[0]);
                formData.append("name", name);

                Loading.loadingShow();
                that.putEditProducer(id, formData);
            }
            else{
                alert('Enter the input, not Empty!');
            }
        });
    },

    async putEditProducer(id, data)
    {
        let that = this;

        await axios.post('/admin/producers/' + parseInt(id), data, {
            headers: {
                'Content-Type': 'multipart/form-data;'
            }
        })
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
            $('#err-prd-edit-name').append(error_name);
        }
    },

    addModule()
    {
        let that = this;

        $('#prd-add').click(function ()
        {
            that.resetAddError();

            let name    = $('#name-prd-add').val();
            let file = document.querySelector('#avatar-prd-add');

            if (name !== '')
            {
                const formData = new FormData();
                formData.append("avatar", file.files[0]);
                formData.append("name", name);

                Loading.loadingShow();
                that.postAddProducer(formData);
            }
            else{
                alert('Enter the input, not Empty!');
            }
        });
    },

    async postAddProducer(data)
    {
        let that = this;

        await axios.post('/admin/producers/add',  data, {
            headers: {
                'Content-Type': 'multipart/form-data;'
            }
        })
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
                that.handelAddProducerError(err.response.data)
            });
    },

    handelAddProducerError(errors)
    {
        let name    = errors.name;

        if (name !== undefined) {
            let error_name = this.handelErrorName(name);
            $('#err-prd-add-name').append(error_name);
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
        $('#prd-reset').click(function ()
        {
            that.resetFormAdd();
        });
    },

    resetFormAdd()
    {
        $('#name-prd-add').val('');
        $('#avatar-prd-add').val('');
        $('#image-preview img').attr('src', '');

        this.resetAddError();
    },

    resetAddError()
    {
        $('#err-prd-add-name').html('');
    },

    resetFormEdit()
    {
        $('#name-prd-edit').val('');
        $('#avatar-prd-edit').val('');
        $('#image-preview-edit img').attr('src', '');

        this.resetEditError();
    },

    resetEditError()
    {
        $('#err-prd-edit-name').html('');
    },

    previewImage()
    {
        let that = this;
        $('#avatar-prd-add').change(function ()
        {
            that.readURL(this, $('#image-preview img'));

        });

        $('#avatar-prd-edit').change(function ()
        {
            that.readURL(this, $('#image-preview-edit img'));

        })
    },

    readURL(input, ele) {
        if (input.files && input.files[0]) {
            let reader = new FileReader();

            reader.onload = function(e) {
                ele.attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
};

$(function () {
    Producer.init();
});
