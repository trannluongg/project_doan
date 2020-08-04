<div class="navigat cate42">
    <h2>Sản phẩm cùng loại</h2>
</div>
<div class="fs-ihotslale fs-ctbn1 hsalebotpro">
    <div class="owl-carousel fsihots owl-loaded owl-drag">
        <div class="owl-stage-outer">
            <div class="owl-stage" id="product-same-brand">
                @foreach($product_same as $key => $p_same)
                    <div class="owl-item">
                        <div class="item">
                            <a href="{{ route('get.user.get_product_detail', ['id' => $p_same['id'] ]) }}" title="{{ $p_same['name'] }}">
                                <p class="fs-icimg">
                                    @php
                                        $rand = rand(0,1);
                                    @endphp
                                    <img class="lazy" src="{{ url('upload/product/'. $p_same['image'][$rand]) }}" alt="{{ $p_same['name'] }}">
                                </p>
                                <p class="fs-hslb"><span> {{'Giảm ' . number_format($p_same['price'] - ($p_same['price'] * ((100-$p_same['sale']) / 100)) ,0,",",".") . 'đ' }}</span></p>
                                <div class="fs-hsif">
                                    <h3 class="fs-icname">{{ $p_same['name'] }}</h3>
                                    <p class="fs-icpri">{{ number_format($p_same['price'] * ((100-$p_same['sale']) / 100) ,0,",",".") . 'đ' }}</p>
                                    <p class="fs-icpridel">{{ number_format($p_same['price'],0,",",".") . 'đ'}}</p>
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
                                @if($p_same['promotion'])
                                    <div class="promo noimage">
                                        <p>{{ $p_same['promotion'] }}</p>
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
