<div id="product-info">
    <div class="row">
        <div class="col-lg-8">
            <div id="fb-root"></div>
            <script async defer crossorigin="anonymous"
                    src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v7.0&appId=636459390195656&autoLogAppEvents=1"
                    nonce="fTE93nYM"></script>
            <div class="fb-comments" data-href="http://doan.abc/product" data-numposts="1" data-width="100%"></div>
        </div>
        <div class="col-lg-4">
            @if(!in_array($product['brand'], [5]))
                @include('pages.product_detail.include._box_product_info')
            @endif
        </div>
    </div>
</div>
