<div class="navigat cate42">
    <h2>Sản phẩm bạn có thể cần</h2>
</div>
<div class="fs-ihotslale fs-ctbn hsalebotpro">
    <div class="owl-carousel fsihots owl-loaded owl-drag">
        <div class="owl-stage-outer">
            <div class="owl-stage" id="promotion">
                @foreach($product_not_brand as $key => $p_n_same)
                    <div class="owl-item">
                        <div class="item">
                            <a href="{{ route('get.user.get_product_detail', ['id' => $p_n_same['id'] ]) }}" title="{{ $p_n_same['name'] }}">
                                <p class="fs-icimg">
                                    <img class="lazy" src="{{ url('upload/product/'. $p_n_same['image'][0]) }}" alt="{{ $p_n_same['name'] }}">
                                </p>
                                <p class="fs-hslb"><span> {{'Giảm ' . number_format($p_n_same['price'] - ($p_n_same['price'] * ((100-$p_n_same['sale']) / 100)) ,0,",",".") . 'đ' }}</span></p>
                                <div class="fs-hsif">
                                    <h3 class="fs-icname">{{ $p_n_same['name'] }}</h3>
                                    <p class="fs-icpri">{{ number_format($p_n_same['price'] * ((100-$p_n_same['sale']) / 100) ,0,",",".") . 'đ' }}</p>
                                    <p class="fs-icpridel">{{ number_format($p_n_same['price'],0,",",".") . 'đ'}}</p>
                                    <div class="fs-dttrate">
                                        <ul>

                                            <li><span class="fs-dttr10"></span></li>
                                            <li><span class="fs-dttr10"></span></li>
                                            <li><span class="fs-dttr10"></span></li>
                                            <li><span class="fs-dttr05"></span></li>
                                            <li><span class="fs-dttr00"></span></li>
                                        </ul>
                                        <p>(126 đánh giá)</p>

                                    </div>
                                </div>
                                @if($p_n_same['promotion'])
                                    <div class="promo noimage">
                                        <p>{{ $p_n_same['promotion'] }}</p>
                                    </div>
                                @else
                                    <div class="fs-pmos">
                                        <div class="fs-pmosif">
                                            <div>
                                                Trả góp 0%
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
