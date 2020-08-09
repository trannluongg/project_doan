<div class="navigat cate42">
    <h2>Tai nghe nổi bật nhất</h2>
</div>
<ul class="homeproduct ">
    @foreach($data_microphone as $key => $microphone)
        @if(in_array($key, [0 ,4]))
            <li class="feature" data-id="{{ $microphone['id'] }}">
                <a href="{{ route('get.user.get_product_detail', ['id' => $microphone['id'] ]) }}">
                    <div id="image-phone">
                        @foreach($microphone['image'] as $image)
                            <img width="600" height="275" class="lazyloaded" alt="{{ $microphone['name'] }}" src="{{ url('upload/product/'. $image) }}">
                        @endforeach
                    </div>
                    <h3>{{ $microphone['name'] }}</h3>
                    <div class="price">
                        <strong>{{ number_format($microphone['price'] * ((100-$microphone['sale']) / 100) ,0,",",".") . 'đ' }}</strong>
                        <span>{{ number_format($microphone['price'],0,",",".") . 'đ'}}</span>
                    </div>
                    <div class="promo noimage">
                        <p>{{ $microphone['promotion'] }}</p>
                    </div>
                    @if($microphone['sale'] == 0)
                        <label class="installment">Trả góp 0%</label>
                    @else
                        <label class="discount">{{'GIẢM ' . $microphone['sale'] . '%'}}</label>
                    @endif
                </a>
            </li>
        @else
            <li data-id="{{ $microphone['id'] }}">
                <a href="{{ route('get.user.get_product_detail', ['id' => $microphone['id'] ]) }}">
                    <img width="180" height="180" class=" lazyloaded" alt="{{ $microphone['name'] }}" src="{{ url('upload/product/'. $microphone['image'][0] )}}">
                    <h3>{{ $microphone['name'] }}</h3>
                    <div class="price">
                        <strong>{{ number_format($microphone['price'] * ((100-$microphone['sale']) / 100) ,0,",",".") . 'đ' }}</strong>
                        <span>{{ number_format($microphone['price'],0,",",".") . 'đ'}}</span>
                    </div>
                    <div class="promo noimage">
                        <p>{{ $microphone['promotion'] }}</p>
                    </div>
                    @if($microphone['sale'] == 0)
                        <label class="installment">Trả góp 0%</label>
                    @else
                        <label class="discount">{{'GIẢM ' . $microphone['sale'] . '%'}}</label>
                    @endif
                </a>
            </li>
        @endif
    @endforeach
</ul>
