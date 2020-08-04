<div class="navigat cate42">
    <h2>Sạc dự phòng nổi bật nhất</h2>
</div>
<ul class="homeproduct ">
    @foreach($data_pin as $key => $pin)
        @if(in_array($key, [0 ,4]))
            <li class="feature" data-id="{{ $pin['id'] }}">
                <a href="{{ route('get.user.get_product_detail', ['id' => $pin['id'] ]) }}">
                    <div id="image-phone">
                        @foreach($pin['image'] as $image)
                            <img width="600" height="275" class="lazyloaded" alt="{{ $pin['name'] }}" src="{{ url('upload/product/'. $image) }}">
                        @endforeach
                    </div>
                    <h3>{{ $pin['name'] }}</h3>
                    <div class="price">
                        <strong>{{ number_format($pin['price'] * ((100-$pin['sale']) / 100) ,0,",",".") . 'đ' }}</strong>
                        <span>{{ number_format($pin['price'],0,",",".") . 'đ'}}</span>
                    </div>
                    <div class="promo noimage">
                        <p>{{ $pin['promotion'] }}</p>
                    </div>
                    @if($pin['sale'] == 0)
                        <label class="installment">Trả góp 0%</label>
                    @else
                        <label class="discount">{{'GIẢM ' . $pin['sale'] . '%'}}</label>
                    @endif
                </a>
            </li>
        @else
            <li data-id="{{ $pin['id'] }}">
                <a href="{{ route('get.user.get_product_detail', ['id' => $pin['id'] ]) }}">
                    @php
                        $rand_pin = rand(0,2);
                    @endphp
                    <img width="180" height="180" class=" lazyloaded" alt="{{ $pin['name'] }}" src="{{url('upload/product/'. $pin['image'][$rand_pin] )}}">
                    <h3>{{ $pin['name'] }}</h3>
                    <div class="price">
                        <strong>{{ number_format($pin['price'] * ((100-$pin['sale']) / 100) ,0,",",".") . 'đ' }}</strong>
                        <span>{{ number_format($pin['price'],0,",",".") . 'đ'}}</span>
                    </div>
                    <div class="promo noimage">
                        <p>{{ $pin['promotion'] }}</p>
                    </div>
                    @if($pin['sale'] == 0)
                        <label class="installment">Trả góp 0%</label>
                    @else
                        <label class="discount">{{'GIẢM ' . $pin['sale'] . '%'}}</label>
                    @endif
                </a>
            </li>
        @endif
    @endforeach
</ul>
