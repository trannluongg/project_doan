import axios from 'axios';
import Toastr from '../../../../js/toastr/toastr';
import Loading from '../../../../js/loading/loading';
import Select2Custom from '../../../helpers/select2_custom';
import select2 from 'select2';

const Product = {

    init() {
        this.addProduct();
        this.getProductEdit();
        this.editProduct();
        this.previewMultipleImage();
        this.anchorLink();
    },

    getProductEdit()
    {
        let that = this;

        $('#product .edit').click(function()
        {
            let id = $(this).data('id');

            Loading.loadingShow();

            $('#card-edit').show();

            setTimeout(() => {
                that.getProduct(id);
            }, 500);
        });
    },

    async getProduct(id)
    {
        await axios.get('/admin/products/' + id)
            .then(res =>
            {
                this.resetFormEdit();
                Loading.loadingHide();

                let data = res.data.data.data;

                $('#product-id').val(data.id);
                $('#name-pro-edit').val(data.name);
                $('#price-pro-edit').val(data.price);
                $('#sale-pro-edit').val(data.sale);
                $('#total-pro-edit').val(data.total);
                $('#description-edit .note-editable').html(data.description);
                $('#promotion-edit .note-editable').html(data.promotion);

                $('#brand-pro-edit').val(data.brand).trigger('change');
                $('#category-pro-edit').val(data.category).trigger('change');
                $('#producer-pro-edit').val(data.producer).trigger('change');

                this.handelImage(data.image);

            })
            .catch(err =>
            {
                Loading.loadingHide();
            });
    },


    editProduct()
    {
        $('#edit-product').click( () =>
        {
            this.resetErrorEdit();
            let id              = $('#product-id').val();
            let name            = $('#name-pro-edit').val();
            let price           = $('#price-pro-edit').val();
            let sale            = $('#sale-pro-edit').val();
            let total           = $('#total-pro-edit').val();
            let brand           = $('#brand-pro-edit').val();
            let producer        = $('#producer-pro-edit').val();
            let category        = $('#category-pro-edit').val();
            let description     = $('#description-edit .note-editable').html();
            let promotion     = $('#promotion-edit .note-editable').html();

            let file = document.getElementById('image-pro-edit');

            if (file.files.length > 5)
            {
                alert('Max Image 5');
                return 0;
            }

            if (name !== '' && price !== '' && sale !== '' && total !== '' && description !== '')
            {
                let formData = this.handelData(file, name, price, sale, total, brand, producer, category, description, promotion);

                Loading.loadingShow();
                this.putEditProduct(id, formData);
            }
            else{
                alert('Enter the input, not Empty!');
            }
        });
    },

    async putEditProduct(id, data)
    {
        await axios.post('/admin/products/' + parseInt(id), data, {
            headers: {
                'Content-Type': 'multipart/form-data;'
            }
        })
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
        let name        = errors.name;
        let price       = errors.price;
        let sale        = errors.sale;
        let description = errors.description;
        let total       = errors.total;
        let images      = errors.images;

        if (name !== undefined) {
            let error_name = this.handelErrorName(name);
            $('#err-pro-edit-name').append(error_name);
        }

        if (price !== undefined) {
            let error_price = this.handelErrorPrice(price);
            $('#err-pro-edit-price').append(error_price);
        }

        if (sale !== undefined) {
            let error_sale = this.handelErrorSale(sale);
            $('#err-pro-edit-sale').append(error_sale);
        }

        if (description !== undefined) {
            let error_description = this.handelErrorDescription(description);
            $('#err-pro-edit-description').append(error_description);
        }

        if (total !== undefined) {
            let error_total = this.handelErrorTotal(total);
            $('#err-pro-edit-total').append(error_total);
        }

        if (images !== undefined) {
            let error_images = this.handelErrorImages(images);
            $('#err-pro-edit-image').append(error_images);
        }
    },

    handelImage(images)
    {
        images.forEach(value =>
        {
            let img = '<img class="col-lg-4" src="'+ value +'"/>';
            $('#image-preview-pro-edit').append(img);
        });
    },

    addProduct()
    {
        $('#pro-add').click(() =>
        {
            this.resetError();

            let name            = $('#name-pro-add').val();
            let price           = $('#price-pro-add').val();
            let sale            = $('#sale-pro-add').val();
            let total           = $('#total-pro-add').val();
            let brand           = $('#brand-pro-add').val();
            let producer        = $('#producer-pro-add').val();
            let category        = $('#category-pro-add').val();
            let description     = $('#description-pro-add').val();
            let promotion       = $('#promotion-pro-add').val();

            let file = document.getElementById('image-pro-add');

            if (file.files.length > 5)
            {
                alert('Max Image 5');
                return 0;
            }

            if (name !== '' && price !== '' && sale !== '' && total !== '' && description !== '')
            {
                let formData = this.handelData(file, name, price, sale, total, brand, producer, category, description, promotion);
                Loading.loadingShow();
                this.postAddProduct(formData);
            }
            else{
                alert('Enter the input, not Empty!');
            }
        });
    },

    async postAddProduct(data) {
        await axios.post('/admin/products/add',  data, {
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
                this.handelAddModuleError(err.response.data)
            });
    },

    handelAddModuleError(errors) {
        let name        = errors.name;
        let price       = errors.price;
        let sale        = errors.sale;
        let description = errors.description;
        let total       = errors.total;
        let images       = errors.images;

        if (name !== undefined) {
            let error_name = this.handelErrorName(name);
            $('#err-pro-add-name').append(error_name);
        }

        if (price !== undefined) {
            let error_price = this.handelErrorPrice(price);
            $('#err-pro-add-price').append(error_price);
        }

        if (sale !== undefined) {
            let error_sale = this.handelErrorSale(sale);
            $('#err-pro-add-sale').append(error_sale);
        }

        if (description !== undefined) {
            let error_description = this.handelErrorDescription(description);
            $('#err-pro-add-description').append(error_description);
        }

        if (total !== undefined) {
            let error_total = this.handelErrorTotal(total);
            $('#err-pro-add-total').append(error_total);
        }

        if (images !== undefined) {
            let error_images = this.handelErrorImages(images);
            $('#err-pro-add-image').append(error_images);
        }
    },


    handelData(file, name, price, sale, total, brand, producer, category, description, promotion)
    {
        const formData = new FormData();

        for( let i = 0; i < file.files.length; i++ )
        {
            let img = file.files[i];
            formData.append('images[' + i + ']', img);
        }

        price       = parseInt(price);
        sale        = parseInt(sale);
        total       = parseInt(total);
        brand       = parseInt(brand);
        producer    = parseInt(producer);
        category    = parseInt(category);

        formData.append("name", name);
        formData.append("price", price);
        formData.append("sale", sale);
        formData.append("total", total);
        formData.append("brand", brand);
        formData.append("producer", producer);
        formData.append("category", category);
        formData.append("description", description);
        formData.append("promotion", promotion);

        return formData;
    },

    handelErrorName(name) {
        let error_name = '';
        name.forEach(value => {
            error_name += '<span class="text-danger" style="font-size: 13px">' + value + '</span>';
        });

        return error_name;
    },

    handelErrorPrice(price) {
        let error_price = '';
        price.forEach(value => {
            error_price += '<span class="text-danger" style="font-size: 13px">' + value + '</span>';
        });

        return error_price;
    },

    handelErrorSale(sale) {
        let error_sale = '';
        sale.forEach(value => {
            error_sale += '<span class="text-danger" style="font-size: 13px">' + value + '</span>';
        });

        return error_sale;
    },

    handelErrorTotal(total) {
        let error_total = '';
        total.forEach(value => {
            error_total += '<span class="text-danger" style="font-size: 13px">' + value + '</span>';
        });

        return error_total;
    },

    handelErrorDescription(description) {
        let error_description = '';
        description.forEach(value => {
            error_description += '<span class="text-danger" style="font-size: 13px">' + value + '</span>';
        });

        return error_description;
    },

    handelErrorImages(image) {
        let error_image = '';
        image.forEach(value => {
            error_image += '<span class="text-danger" style="font-size: 13px">' + value + '</span>';
        });

        return error_image;
    },

    resetFormAddClick()
    {
        $('#pro-reset').click(function ()
        {
            this.resetFormAdd();
        });
    },

    resetFormAdd()
    {
        $('#name-pro-add').val('');
        $('#price-pro-add').val('');
        $('#sale-pro-add').val('');
        $('#total-pro-add').val('');
        $('#brand-pro-add').val('');
        $('#category-pro-add').val('');
        $('#producer-pro-add').val('');
        $('#description-pro-add').val('');
        $('#promotion-pro-add').val('');
        $('#image-pro-add').val('');
        $('#image-preview-pro').html('');
        $('#description-add .note-editable').html('');
        $('#promotion-add .note-editable').html('');
        this.resetError();
    },

    resetFormEdit()
    {
        $('#name-pro-edit').val('');
        $('#price-pro-edit').val('');
        $('#sale-pro-edit').val('');
        $('#total-pro-edit').val('');
        $('#brand-pro-edit').val('');
        $('#category-pro-edit').val('');
        $('#producer-pro-edit').val('');
        $('#description-pro-edit').val('');
        $('#promotion-pro-edit').val('');
        $('#image-pro-edit').val('');
        $('#image-preview-pro-edit').html('');
        $('#description-edit .note-editable').html('');
        $('#promotion-edit .note-editable').html('');
        this.resetErrorEdit();
    },

    resetError()
    {
        $('#err-pro-add-image').html('');
        $('#err-pro-add-name').html('');
        $('#err-pro-add-price').html('');
        $('#err-pro-add-sale').html('');
        $('#err-pro-add-total').html('');
        $('#err-pro-add-description').html('');
        $('#err-pro-add-promotion').html('');
    },

    resetErrorEdit()
    {
        $('#err-pro-edit-image').html('');
        $('#err-pro-edit-name').html('');
        $('#err-pro-edit-price').html('');
        $('#err-pro-edit-sale').html('');
        $('#err-pro-edit-total').html('');
        $('#err-pro-edit-description').html('');
        $('#err-pro-edit-promotion').html('');
    },

    getMultipleImage(input, placeToInsertImagePreview)
    {
        if (input.files)
        {
            let filesAmount = input.files.length;

            for (let i = 0; i < filesAmount; i++)
            {
                let reader = new FileReader();

                reader.onload = function(event)
                {
                    $($.parseHTML('<img class="col-sm-12 col-md-4 col-lg-4">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                };

                reader.readAsDataURL(input.files[i]);
            }
        }
    },

    previewMultipleImage()
    {
        let that = this;

        $('#image-pro-add').on('change', function()
        {
            $('#image-preview-pro').html('');
            that.getMultipleImage(this, '#image-preview-pro');
        });

        $('#image-pro-edit').on('change', function()
        {
            $('#image-preview-pro-edit').html('');
            that.getMultipleImage(this, '#image-preview-pro-edit');
        });
    },

    anchorLink()
    {
        $('.dropdown-item.edit').click(function(e)
        {
            e.preventDefault();
            let target = $('#card-edit');
            if(target.length){
                let scrollTo = target.offset().top - 10;
                $('body, html').animate({scrollTop: scrollTo+'px'}, 500);
            }
        });
    }

};

$(function () {
    $('.select2').select2({
        width: '100%'
    });

    $('.js-select2').select2({
        templateResult: Select2Custom.formatState,
        templateSelection: Select2Custom.formatState,
        width: '100%'
    });

    Product.init();

});
