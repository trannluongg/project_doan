export default {
    formatState (opt)
    {
        let $opt = null;

        if (!opt.id) return opt.text.toUpperCase();

        let opt_image = $(opt.element).attr('data-image');

        if (!opt_image)
        {
            return opt.text.toUpperCase();
        }
        else
        {
            $opt = $('<span><img src="' + opt_image + '" width="60px" style="height: 20px; object-fit: contain"/> ' + opt.text.toUpperCase() + '</span>');

            return $opt;
        }
    }
}
