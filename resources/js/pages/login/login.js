import SidebarMenu from "../../components/sidebar_mobile";
import AjaxSearch from "../../components/ajax_search_product";
import LoginAjax from "../../components/login_ajax";
import ShowCart from "../../components/show_cart";

const Login = {

    init()
    {
        SidebarMenu.init();
        LoginAjax.init();
        AjaxSearch.init();
        ShowCart.init();
    },


};

$(function () {
    Login.init();
});
