<div class="fs-carow clearfix fs-row4phone viewgrid">
    @foreach($products as $product)
        <div class="fs-lpil">
            <a class="fs-lpil-img" href="{{ route('get.user.get_product_detail', ['id' => $product['id']]) }}" title="{{ $product['name'] }}">
                <p>
                    <img class="lazy" src="{{ url('upload/product/'. $product['image'][0]) }}" alt="{{ $product['name'] }}" style="display: block;">
                </p>
            </a>
            <div class="fs-lpil-if">
                <div class="fs-lpilname">
                    <h3 class="fs-lpil-name">
                        <a href="{{ route('get.user.get_product_detail', ['id' => $product['id']]) }}" title="{{ $product['name'] }}">
                            {{ $product['name'] }}
                        </a>
                    </h3>

                    <div class="fs-lpil-price">
                        <p>{{ number_format($product['price'] * ((100-$product['sale']) / 100) ,0,",",".") . 'đ' }}</p>
                        <span>{{ number_format($product['price'],0,",",".") . 'đ'}}</span>
                    </div>

                    <div class="fs-dttrate">
                        <ul>

                            <li><span class="fs-dttr10"></span></li>
                            <li><span class="fs-dttr10"></span></li>
                            <li><span class="fs-dttr10"></span></li>
                            <li><span class="fs-dttr05"></span></li>
                            <li><span class="fs-dttr00"></span></li>
                        </ul>
                        <p>(73 đánh giá)</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
