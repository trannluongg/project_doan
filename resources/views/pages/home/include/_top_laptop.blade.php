<div class="navigat cate44">
    <h2>Laptop nổi bật nhất</h2>
</div>
<ul class="homeproduct ">
    @foreach($data_laptop as $key => $laptop)
        @if(in_array($key, [0 ,4]))
            <li class="feature" data-id="{{ $laptop['id'] }}">
                <a href="{{ route('get.user.get_product_detail', ['id' => $laptop['id'] ]) }}">
                    <div id="image-laptop">
                        @foreach($laptop['image'] as $image)
                            <img width="600" height="275" class="lazyloaded" alt="{{ $laptop['name'] }}" src="{{ url('upload/product/'. $image) }}">
                        @endforeach
                    </div>
                    <h3>{{ $laptop['name'] }}</h3>
                    <div class="price">
                        <strong>{{ number_format($laptop['price'] * ((100-$laptop['sale']) / 100) ,0,",",".") . 'đ' }}</strong>
                        <span>{{ number_format($laptop['price'],0,",",".") . 'đ'}}</span>
                    </div>
                    <div class="promo noimage">
                        <p>{{ $laptop['promotion'] }}</p>
                    </div>
                    @if($laptop['sale'] == 0)
                        <label class="installment">Trả góp 0%</label>
                    @else
                        <label class="discount">{{'GIẢM ' . $laptop['sale'] . '%'}}</label>
                    @endif
                </a>
            </li>
        @else
            <li data-id="{{ $laptop['id'] }}">
                <a href="{{ route('get.user.get_product_detail', ['id' => $laptop['id'] ]) }}">
                    <img width="180" height="180" class=" lazyloaded" alt="{{ $laptop['name'] }}" src="{{ url('upload/product/'. $laptop['image'][0]) }}">
                    <h3>{{ $laptop['name'] }}</h3>
                    <div class="price">
                        <strong>{{ number_format($laptop['price'] * ((100-$laptop['sale']) / 100) ,0,",",".") . 'đ' }}</strong>
                        <span>{{ number_format($laptop['price'],0,",",".") . 'đ'}}</span>
                    </div>
                    <div class="promo noimage">
                        <p>{{ $laptop['promotion'] }}</p>
                    </div>
                    @if($laptop['sale'] == 0)
                        <label class="installment">Trả góp 0%</label>
                    @else
                        <label class="discount">{{'GIẢM ' . $laptop['sale'] . '%'}}</label>
                    @endif
                </a>
            </li>
        @endif
    @endforeach
</ul>
