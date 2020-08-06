import SidebarMenu from "../../components/sidebar_mobile";
import ShowCart from "../../components/show_cart";
import AjaxSearch from "../../components/ajax_search_product";

const Product = {
    init()
    {
        SidebarMenu.init();
        ShowCart.init();
        AjaxSearch.init();
    }
};

$(function () {
    Product.init();
});
