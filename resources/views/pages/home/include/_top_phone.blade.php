<div class="navigat cate42">
    <h2>Điện thoại nổi bật nhất</h2>
</div>
<ul class="homeproduct ">
    @foreach($data_phone as $key => $phone)
        @if(in_array($key, [0 ,4]))
            <li class="feature" data-id="{{ $phone['id'] }}">
                <a href="{{ route('get.user.get_product_detail', ['id' => $phone['id'] ]) }}">
                    <div id="image-phone">
                        @foreach($phone['image'] as $image)
                            <img width="600" height="275" class="lazyloaded" alt="{{ $phone['name'] }}" src="{{ url('upload/product/'. $image) }}">
                        @endforeach
                    </div>
                    <h3>{{ $phone['name'] }}</h3>
                    <div class="price">
                        <strong>{{ number_format($phone['price'] * ((100-$phone['sale']) / 100) ,0,",",".") . 'đ' }}</strong>
                        <span>{{ number_format($phone['price'],0,",",".") . 'đ'}}</span>
                    </div>
                    <div class="promo noimage">
                        <p>{{ $phone['promotion'] }}</p>
                    </div>
                    @if($phone['sale'] == 0)
                        <label class="installment">Trả góp 0%</label>
                    @else
                        <label class="discount">{{'GIẢM ' . $phone['sale'] . '%'}}</label>
                    @endif
                </a>
            </li>
        @else
            <li data-id="{{ $phone['id'] }}">
                <a href="{{ route('get.user.get_product_detail', ['id' => $phone['id'] ]) }}">
                    @php
                        $rand_phone = rand(0,2);
                    @endphp
                    <img width="180" height="180" class=" lazyloaded" alt="{{ $phone['name'] }}" src="{{ url('upload/product/'. $phone['image'][$rand_phone] )}}">
                    <h3>{{ $phone['name'] }}</h3>
                    <div class="price">
                        <strong>{{ number_format($phone['price'] * ((100-$phone['sale']) / 100) ,0,",",".") . 'đ' }}</strong>
                        <span>{{ number_format($phone['price'],0,",",".") . 'đ'}}</span>
                    </div>
                    <div class="promo noimage">
                        <p>{{ $phone['promotion'] }}</p>
                    </div>
                    @if($phone['sale'] == 0)
                        <label class="installment">Trả góp 0%</label>
                    @else
                        <label class="discount">{{'GIẢM ' . $phone['sale'] . '%'}}</label>
                    @endif
                </a>
            </li>
        @endif
    @endforeach
</ul>
