import SidebarMenu from "../../components/sidebar_mobile";
import 'jquery-validation'
import ShowCart from "../../components/show_cart";

const Home = {
    init()
    {
        SidebarMenu.init();
        ShowCart.init();
    }
};

$(function () {
    Home.init();
});
