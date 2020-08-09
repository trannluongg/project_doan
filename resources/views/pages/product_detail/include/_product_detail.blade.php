<div class="fs-dtbott">
    <div class="fs-dtslide">
        <div class="fs-dtslb clearfix">
            <div class="owl-carousel sldtmain owl-loaded">
                <div class="owl-stage-outer">
                    <div class="owl-stage" id="product-detail">
                        @foreach($product['image'] as $key => $img)
                            <div class="owl-item">
                                <div class="item">
                                    <div class="easyzoom is-ready">
                                        <a href="{{ url('upload/product/'. $img) }}" target="_blank"
                                           title="{{ $product['name'] }}">
                                            <img src="{{ url('upload/product/'. $img) }}" alt="{{ $product['name'] }}">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="owl-nav">
            <div class="owl-prev disabled"></div>
            <div class="owl-next"></div>
        </div>
        <p class="fs-dtslnt"><i class="icdt fs-dtzoom"></i> Click để xem ảnh</p>
    </div>
    <div class="fs-dtinfo">
        <div class="fs-pr-box">
            <p class="fs-dtprice ">
                {{ number_format($product['price'] * ((100-$product['sale']) / 100) ,0,",",".")}} <strong>₫</strong>
                <label class="fs-pernumpro">
                    Trả góp 0%
                </label>
            </p>
        </div>
        <div class="status-product"></div>
        <p class="ft-ghoh" data-toggle="modal" data-target="#gh1gio"> GIAO HÀNG TRONG 1 GIỜ 63 TỈNH THÀNH </p>
        <div class="fk-boxs" id="km-all" data-comt="False">
            <div id="km-detail">
                <p class="fk-tit">Khuyến mại đặc biệt (SL có hạn)</p>
                <div class="fk-main">
                    <div class="fk-sales">
                        <ul>
                            <li>Khuyến mại {{ $product['sale'] . '%' }}</li>
                        </ul>

                        <ul>
                            <li>{{ $product['promotion'] }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <ul class="product-sale">
            <li id="amount-reduction"><span>-</span></li>
            <li><input type="text" id="amount" value="1"></li>
            <li id="amount-increase"><span>+</span></li>
        </ul>
        <input type="hidden" class="txtTypeID" name="name" value="1">
        <ul data-xx="" class="fs-dtibtn clearfix build-order">
            <li class="fsw100">
                <a href="javascript:void(0)" class="add-to-cart" data-value="{{ $product['id'] }}">
                    <b>Thêm vào giỏ hàng</b>
                </a>
            </li>
            <li class="fsw100">
                <a class="fs-dti-oder dts-addtocart" href="{{ route('get.product.buy_now', ['id' => $product['id']]) }}" title="">
                    <p>MUA NGAY</p>
                    <span>Giao hàng trong 1 giờ hoặc nhận tại shop</span>
                </a>
            </li>
        </ul>
        <p class="fs-dtinoti">Gọi <strong>0987654321</strong> để được tư vấn mua hàng (Miễn phí)</p>
    </div>
    <div class="fs-dtckr">
        <h4 class="fs-dtcktit">LH Shop cam kết:</h4>
        <ul class="fs-dtckbox">
            <li><span class="icdt fs-dtck1"></span>
                <p>Hàng chính hãng</p></li>
            <li><span class="icdt fs-dtck2"></span>
                <p>Bảo hành 12 Tháng chính hãng</p></li>
            <li><span class="icdt fs-dtck3"></span>
                <p>Giao hàng miễn phí toàn quốc trong 60 phút</p></li>
            <li><span class="icdt fs-dtck4"></span>
                <p>Bảo hành nhanh tại LH Shop trên toàn quốc</p></li>
        </ul>
    </div>
</div>
