import toastr from "toastr";

class Toastr
{
    showToastr()
    {
        return toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };
    };

    toastrUpdateSuccess(title = 'Update Successfully!')
    {
        toastr.success(title);
    };

    toastrUpdateError(title ='Update Error!')
    {
        toastr.error(title);
    };

    toastrAddSuccess(title = 'Add Successfully!')
    {
        toastr.success(title);
    };

    toastrAddError(title = 'Add Error!')
    {
        toastr.error(title);
    };
}
export default Toastr = new Toastr();
