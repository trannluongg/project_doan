const SidebarMenu = {
    init()
    {
        this.showMenu();
        this.hideMenu();
    },

    showMenu()
    {
        $('.js-menu-mobile').click(function ()
        {
            $('body').css('overflow','hidden');
            $('#background-black').fadeIn();
            $('#menu-mobile').addClass('show');

        })
    },

    hideMenu()
    {
        $('#menu-mobile .close a, #background-black').click(function ()
        {
            $('#menu-mobile').removeClass('show');
            $('#background-black').fadeOut();
            $('body').css('overflow','auto');
        });
    }
};

export default SidebarMenu;
