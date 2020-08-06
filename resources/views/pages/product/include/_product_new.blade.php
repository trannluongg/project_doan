<div class="fs-icate clearfix">
    <div class="fs-itit">
        <h2><a href="/dien-thoai?sort=ban-chay-nhat" title="Điện thoại hot nhất">Điện thoại hot nhất</a></h2>
    </div>
    <div class="owl-carousel fsicte2 otherlazy owl-loaded owl-drag afterlazyma" data-items="5">
        <div class="owl-stage-outer">
            <div class="owl-stage product-new" id="product-new">
                @foreach($products as $key => $p)
                    <div class="owl-item" >
                    <div class="item">
                        <a href="{{ route('get.user.get_product_detail', ['id' => $p['id'] ]) }}" title="{{ $p['name'] }}">
                            <p class="fs-icimg">
                                <img class="lazy" src="{{ url('upload/product/'. $p['image'][0]) }}" alt="{{ $p['name'] }}">
                            </p>
                            <h3 class="fs-icname">{{ $p['name'] }}</h3>
                            <p class="fs-icpri">
                                {{ number_format($p['price'] * ((100-$p['sale']) / 100) ,0,",",".") }}<span>đ</span>
                            </p>
                            <div class="fs-dttrate">
                                <ul>
                                    <li><span class="fs-dttr10"></span></li>
                                    <li><span class="fs-dttr10"></span></li>
                                    <li><span class="fs-dttr10"></span></li>
                                    <li><span class="fs-dttr05"></span></li>
                                    <li><span class="fs-dttr00"></span></li>
                                </ul>
                            </div>
                        </a>
                        <label class="fs-lbsr fs-lbstxt">{{'Giảm ' . number_format($p['price'] - ($p['price'] * ((100-$p['sale']) / 100)) ,0,",",".") . 'đ' }}</label>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
