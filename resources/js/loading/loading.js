class Loading
{
    constructor()
    {
        this.loading = $('.boxes-group');
    };

    loadingShow()
    {
        this.loading.css('display', 'flex');
    };

    loadingHide()
    {
        this.loading.hide();
    };

}

export default Loading = new Loading();
