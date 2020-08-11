<div class="purchase-list-page__checkout-card-wrapper">
    @if($bills && !empty($bills))
        @foreach($bills as $key => $bill)
            <div class="order-card__container">
                <div class="order-card__content-wrapper">
                    <div class="order-card__content">
                        <div class="order-content__container">
                            <div class="order-content__header">
                                <div class="order-content__header__seller">
                                    <span class="order-content__header__seller__name">Chi tiết đơn hàng ID: {{$key}} </span>
                                </div>
                                <div class="order-content-status">
                                    @switch($bill['status'])
                                        @case(1)
                                            <a class="bill-cancel" href="javascript:void(0)" data-id="{{ $key }}">Hủy đơn hàng</a>
                                            @break;
                                        @case(2)
                                            <span>Đã duyệt</span>
                                            @break;
                                        @case(3)
                                            <span>Đã giao hàng</span>
                                            @break;
                                        @case(4)
                                            <a class="bill-again" href="javascript:void(0)" data-id="{{ $key }}">Mua lần nữa</a>
                                            @break;
                                        @case(5)
                                            <span>Đơn hàng của bạn đã bị khóa</span>
                                        @break;
                                    @endswitch
                                </div>
                            </div>
                            <div class="order-content__item-list">
                                <a class="order-content__item-wrapper" href="javascript:void(0)">
                                    @php
                                        $products = $bill['product'];
                                    @endphp
                                    @foreach($products as $product)
                                        @php
                                            $image = explode('|', $product['image'])[0];
                                        @endphp
                                    <div class="order-content__item order-content__item--last">
                                        <div class="order-content__item__col order-content__item__detail">
                                            <div class="order-content__item__product">
                                                <div class="order-content__item__image">
                                                    <div class="shopee-image__wrapper">
                                                        <div class="shopee-image__content"
                                                             style="background-image: url({{ url('upload/product/' . $image) }});">
                                                            <div class="shopee-image__content--blur"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="order-content__item__detail-content">
                                                    <div class="order-content__item__name">
                                                        {{ $product['name'] }}
                                                    </div>
                                                    <p>{{ $product['promotion'] }}</p>
                                                    <div class="order-content__item__quantity">x {{ $product['qty'] }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="order-content__item__price order-content__item__col order-content__item__col--small order-content__item__col--last">
                                            <div class="order-content__item__price-text">
                                                <div class="shopee-price--original">{{ number_format($product['price'],0,",",".") . 'đ'}}</div>
                                                <div class="shopee-price--primary">{{ number_format(($product['price'] - $product['price'] * (($product['sale']) / 100)),0,",",".") . 'đ'}}</div>
                                            </div>
                                        </div>
                                    </div>
                                        @endforeach
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="order-card__buttons-container">
                    <div class="purchase-card-buttons__wrapper">
                        <div class="purchase-card-buttons__total-payment">
                            <div class="shopee-guarantee-icon purchase-card-buttons__shopee-guarantee-icon"></div>
                            <span class="purchase-card-buttons__label-price"> Tổng số tiền: </span><span
                                class="purchase-card-buttons__total-price"> ₫{{ number_format($bill['sum_money'],0,",",".") }}</span></div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>
