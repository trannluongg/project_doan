import SidebarMenu from "../../components/sidebar_mobile";
import 'jquery-validation'
import ShowCart from "../../components/show_cart";
import AjaxSearch from "../../components/ajax_search_product";

const Home = {
    init()
    {
        SidebarMenu.init();
        ShowCart.init();
        AjaxSearch.init();
    }
};

$(function () {
    Home.init();
});
