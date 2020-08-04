import $ from 'jquery';
import SidebarMenu from "../../components/sidebar_mobile";

const Search = {
    init()
    {
        SidebarMenu.init();
    }
};

$(function () {
    Search.init();
});
$(document).ready(function () {
    let bLazy = new Blazy({
    });
});
