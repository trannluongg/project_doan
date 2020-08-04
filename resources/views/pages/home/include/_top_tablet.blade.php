<div class="navigat cate522">
    <h2>Tablet nổi bật nhất</h2>
{{--    <div class="viewallcat">--}}

{{--        <a href="">Máy tính bảng iPad</a>--}}
{{--        <a href="">Máy tính bảng Samsung</a>--}}
{{--        <a href="">iPad 10.2 inch</a>--}}
{{--        <a href="">Samsung Galaxy Tab S6 Lite</a>--}}
{{--        <a href="">iPad Pro 11 inch 2020</a>--}}
{{--    </div>--}}
</div>
<ul class="homeproduct ">
    @foreach($data_tablet as $key => $tablet)
        @if(in_array($key, [0 ,4]))
            <li class="feature" data-id="{{ $tablet['id'] }}">
                <a href="{{ route('get.user.get_product_detail', ['id' => $tablet['id'] ]) }}">
                    <div id="image-tablet">
                        @foreach($tablet['image'] as $image)
                            <img width="600" height="275" class="lazyloaded" alt="{{ $tablet['name'] }}" src="{{ url('upload/product/'. $image )}}">
                        @endforeach
                    </div>
                    <h3>{{ $tablet['name'] }}</h3>
                    <div class="price">
                        <strong>{{ number_format($tablet['price'] * ((100-$tablet['sale']) / 100) ,0,",",".") . 'đ' }}</strong>
                        <span>{{ number_format($tablet['price'],0,",",".") . 'đ'}}</span>
                    </div>
                    <div class="promo noimage">
                        <p>{{ $tablet['promotion'] }}</p>
                    </div>
                    @if($tablet['sale'] == 0)
                        <label class="installment">Trả góp 0%</label>
                    @else
                        <label class="discount">{{'GIẢM ' . $tablet['sale'] . '%'}}</label>
                    @endif
                </a>
            </li>
        @else
            <li data-id="{{ $tablet['id'] }}">
                <a href="{{ route('get.user.get_product_detail', ['id' => $tablet['id'] ]) }}">
                    @php
                        $rand_tablet = rand(0,2);
                    @endphp
                    <img width="180" height="180" class=" lazyloaded" alt="{{ $tablet['name'] }}" src="{{ url('upload/product/'. $tablet['image'][$rand_tablet] )}}">
                    <h3>{{ $tablet['name'] }}</h3>
                    <div class="price">
                        <strong>{{ number_format($tablet['price'] * ((100-$tablet['sale']) / 100) ,0,",",".") . 'đ' }}</strong>
                        <span>{{ number_format($tablet['price'],0,",",".") . 'đ'}}</span>
                    </div>
                    <div class="promo noimage">
                        <p>{{ $tablet['promotion'] }}</p>
                    </div>
                    @if($tablet['sale'] == 0)
                        <label class="installment">Trả góp 0%</label>
                    @else
                        <label class="discount">{{'GIẢM ' . $tablet['sale'] . '%'}}</label>
                    @endif
                </a>
            </li>
        @endif
    @endforeach
</ul>
