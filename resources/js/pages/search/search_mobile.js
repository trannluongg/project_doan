import $ from 'jquery';
import SidebarMenu from "../../components/sidebar_mobile";
import AjaxSearch from "../../components/ajax_search_product";
import ShowCart from "../../components/show_cart";

const Search = {
    init()
    {
        SidebarMenu.init();
        ShowCart.init();
        AjaxSearch.init();
        this.search();
        this.resetForm();
        this.filterProducer();
    },

    search()
    {
        $('#pro-price_sort').change(function ()
        {
            $('#price-sort').submit();
        });

        $('.filterBrand input[type="radio"], .filterPrice input[type="radio"]').change(function ()
        {
            $('#search-all').submit();
        });

    },


    resetForm()
    {
        $('#reset-form a').click((e) =>
        {
            e.preventDefault();
            let $search = $('#search-all');
            $search.find('input[type="radio"]').prop('checked', false);
            $search.submit();
        })
    },

    filterProducer()
    {
        let that = this;
        $('.fs-ctf-risearch input[type="text"]').keyup( function(){

            let searchText = that.changeAlias($(this).val().toLowerCase());

            $('.filterBrand > li').each(function ()
            {
                let currentLiText = that.changeAlias($(this).children().next().text().toLowerCase()),
                    showCurrentLi = currentLiText.indexOf(searchText) !== -1;

                $(this).toggle(showCurrentLi);
            });
        });
    },

    changeAlias(alias)
    {
        let str = alias;
        str = str.toLowerCase();
        str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g,"a");
        str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g,"e");
        str = str.replace(/ì|í|ị|ỉ|ĩ/g,"i");
        str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g,"o");
        str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u");
        str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y");
        str = str.replace(/đ/g,"d");
        str = str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'|\"|\&|\#|\[|\]|~|\$|_|`|-|{|}|\||\\/g," ");
        str = str.replace(/ + /g," ");
        str = str.trim();
        return str;
    }
};

$(function () {
    Search.init();
});
