<div class="fs-ihotslale hsalebotpro">
    <div class="owl-carousel fsihots owl-loaded owl-drag">
        <div class="owl-stage-outer">
            <div class="owl-stage" id="promotion">
                @foreach($data_max_sale as $key => $p_sale)
                    <div class="owl-item">
                        <div class="item">
                            <a href="{{ route('get.user.get_product_detail', ['id' => $p_sale['id'] ]) }}" title="{{ $p_sale['name'] }}">
                                <p class="fs-icimg">
                                    @php
                                        $rand = rand(0,2);
                                    @endphp
                                    <img class="lazy" src="{{ url('upload/product/'. $p_sale['image'][$rand]) }}" alt="{{ $p_sale['name'] }}">
                                </p>
                                <p class="fs-hslb"><span> {{'Giảm ' . number_format($p_sale['price'] - ($p_sale['price'] * ((100-$p_sale['sale']) / 100)) ,0,",",".") . 'đ' }}</span></p>
                                <div class="fs-hsif">
                                    <h3 class="fs-icname">{{ $p_sale['name'] }}</h3>
                                    <p class="fs-icpri">{{ number_format($p_sale['price'] * ((100-$p_sale['sale']) / 100) ,0,",",".") . 'đ' }}</p>
                                    <p class="fs-icpridel">{{ number_format($p_sale['price'],0,",",".") . 'đ'}}</p>
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
                                @if($p_sale['promotion'])
                                    <div class="promo noimage">
                                        <p>{{ $p_sale['promotion'] }}</p>
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
