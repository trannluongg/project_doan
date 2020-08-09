<div class="ghg-tops clearfix">
    <p class="ghg-hds">GIỎ HÀNG CỦA BẠN <span>(<i class="countTotalCart">{{ count($cart->items) }}</i>  sản phẩm)</span></p>
    <a class="ghg-back" href="/" title="Trang chủ">Mua thêm sản phẩm khác</a>
</div>
    <div class="fs-ghlul clearfix">
        <div class="loading-cart">
            <img src="{{ url('images/loading_cart.gif')}}" alt="">
        </div>
        @foreach($cart->items as $c)
            <div class="fs-ghli proitem">
                <div class="fs-ghltb clearfix">
                    <div class="fs-ghltd fs-ghltb1">
                        <p class="fs-ghimg">
                            <a href="{{ route('get.user.get_product_detail', ['id' => $c['item']->id ]) }}" target="_blank">
                                @php
                                    $img = $c['item']->pro_image;
                                    $img = explode('|', $img);
                                @endphp
                                <img src="{{ url('upload/product/'.$img[0]) }}" alt="{{ $c['item']->pro_name }}">
                            </a>
                        </p>
                    </div>
                    <div class="fs-ghcaif">
                        @php
                            $price = $c['item']->pro_price * ((100-$c['item']->pro_sale) / 100);
                        @endphp
                        <div class="fs-ghcatbs">
                            <div class="fs-ghltd fs-ghif">
                                <h3 class="fs-ghname">
                                    <a href="{{ route('get.user.get_product_detail', ['id' => $c['item']->id ]) }}" target="_blank">{{ $c['item']->pro_name }}</a>
                                </h3>
                                <p class="promotion">{{ $c['item']->pro_promotion  }}</p>
                            </div>
                            <div class="fs-ghltd fs-ghpri">
                                <p class="fs-ghpri1">{{ number_format($price ,0,",",".") }} <sup>đ</sup></p>
                            </div>
                            <div class="fs-ghltd fs-ghplus">
                                <div class="fs-ghpltb clearfix">
                                    <span class="fsghbtn amount-reduction" data-id="{{$c['item']->id}}" data-price="{{$price}}"><i>-</i></span>
                                    <input class="fs-ghplip amount" data-id="{{$c['item']->id}}" type="text" value="{{ $c['qty'] }}">
                                    <span class="fsghbtn amount-increase" data-id="{{$c['item']->id}}" data-price="{{$price}}">+</span>
                                </div>
                            </div>
                            <span class="fs-ghdel order-delete" onclick="return confirm('Bạn muốn xóa sản phẩm này khỏi giỏ hàng chứ!')" data-id="{{$c['item']->id}}">⨯</span>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="ghg-bot clearfix">
        <ul class="ghg-bor clearfix">
            <li class="ghg-br2">
                <label>Tổng tiền:</label>
                <span class="fs-ghrttpri total-money">{{ number_format($cart->totalPrice,0,",",".") }}<sup>đ</sup></span>
            </li>
        </ul>
    </div>
