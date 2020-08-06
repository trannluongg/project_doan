import axios from 'axios';

const AjaxSearch = {
    init()
    {
        this.getValueSearch();
    },

    getValueSearch()
    {
        let that = this;
        $('form .fs-stxt').keyup(function ()
        {
            let value = $(this).val();

            let x = '';

            if (value.trim() !== '')
            {
                if (x !== '') clearTimeout(x);

                x = setTimeout(() => {

                    let data = {
                        'key_search' : value
                    };

                    that.getProductSearch(data)
                }, 500)
            }
            else
            {
                $('.wrap-suggestion').html('').css('display','none');
            }
        })
    },

    async getProductSearch(data)
    {
        await axios.get('/ajax-search', {params: data})
            .then(res => {
                this.handelResSearchProduct(res.data.data);
            })
            .catch(err => {
                console.log(err);
            })
    },

    handelResSearchProduct(data)
    {
        let html = '';

        if (Object.keys(data).length === 0) return $('.wrap-suggestion').html('').css('display','none');

        Object.keys(data).forEach((index) =>
        {
            let value   = data[index];
            let id      = value.id;
            let name    = value.name;
            let image   = value.image[0];
            let price   = value.price * ((100-value.sale) / 100);
            price       = price.toString().replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");

            html +=        `
                <li>
                    <a href="/product/`+ id +`">
                        <img src="http://doan.abc/upload/product/` + image +`" alt="`+name+`">
                        <h3>`+name+`</h3>
                        <span class="price">`+price+`₫</span>
                    </a>
                </li>
            `;
        });

        $('.wrap-suggestion').html(html).css('display','block');
    }
};

export default AjaxSearch;
