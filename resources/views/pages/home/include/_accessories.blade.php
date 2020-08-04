<div class="navigat acc1">
    <h2>Phụ kiện giá rẻ</h2>
</div>
<div class="owl-carousel homepromo acc owl-theme" style="opacity: 1; display: block;">
    <div class="owl-wrapper-outer">
        <div class="owl-wrapper" id="accessories">
            @foreach($data_accessories as $key => $accessories)
                <div class="owl-item">
                <div class="item">
                    <a href="{{ route('get.user.get_product_detail', ['id' => $accessories['id'] ]) }}">
                        @php
                            $rand_accessories = rand(0,2);
                        @endphp
                        <img width="180" height="180" class=" lazyloaded" alt="{{ $accessories['name'] }}" src="{{ url('upload/product/'. $accessories['image'][$rand_accessories] )}}">
                        <h3>{{ $accessories['name'] }}</h3>
                        <h6 class="textkm"></h6>
                        <div class="price">
                            <strong>{{ number_format($accessories['price'] * ((100-$accessories['sale']) / 100) ,0,",",".") . 'đ' }}</strong>
                            <span>{{ number_format($accessories['price'],0,",",".") . 'đ'}}</span>
                        </div>
                        <label class="discount">{{'GIẢM ' . $accessories['sale'] . '%'}}</label>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
