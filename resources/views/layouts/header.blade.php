<header class="fs-header">
    <div class="f-hdtop">
        <div class="f-wrap">
            <a class="fs-logo" href="/" title=""><i class="ficon f-logo"></i><span class="logo-text">shop.com</span></a>
            <ul class="fs-hdmn">
                @if (isset($user) && $user)
                    <li class="menu-user">
                        <a href="" class="user-current">
                            <img src="{{ url('upload/avatar/' . $user->avatar) }}" alt="{{ $user->name }}">
                            <span>{{ $user->name }}</span>
                        </a>
                        <div class="dropdown-menu-user">
                            <ul>
                                <li><a href="">Thông tin tài khoản</a></li>
                                <li><a href="">Đơn hàng</a></li>
                                <li><a href="{{ route('get.user.logout', ['token' => \App\Core123\Auth\AuthMe::token('users')]) }}">Đăng xuất</a></li>
                            </ul>
                        </div>
                    </li>
                @else
                    <li><a rel="nofollow" href="/register" title="Hàng Mỹ"><i class="demo-icon icon-fado"></i><span>Đăng kí</span></a></li>
                    <li>
                        <a href="/login" title=""><i class="demo-icon icon-document"></i><span>Đăng nhập</span></a>
                    </li>
                @endif
                <li class="show-mobile">
                    <a href="javascript:void(0)" title="" class="show-cart">
                        <i class="demo-icon icon-basket"></i>
                        <span class="hide">Giỏ hàng</span>
                        <b class="fs-cartic countTotalCart">{{ \Illuminate\Support\Facades\Session::has('cart') ? count(\Illuminate\Support\Facades\Session::get('cart')->items) : 0 }}</b>
                    </a>
                    <div id="all-cart">
                        <img src="{{ url('images/loading.gif') }}" alt="" class="loading">
                        <ul>
                        </ul>
                        <a href="{{ route('get.cart.get_cart') }}" class="cart-detail">Xem chi tiết</a>
                    </div>
                </li>
                <li class="show-mobile menu">
                    <a href="javascript:void(0)" class="js-menu-mobile">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                    </a>
                </li>
            </ul>
            <div class="fs-search">
                <form action="" method="get" autocomplete="off">
                    <input class="fs-stxt" type="text" name="" placeholder="Nhập tên điện thoại, máy tính, phụ kiện... cần tìm" autocomplete="off" maxlength="50">
                    <button type="submit" class="search-button"><i class="fa fa-search" aria-hidden="true"></i></button>
                    <div class="fs-sresult" style="display : block !important">
                        <div class="fs-sremain">
                            <ul class="wrap-suggestion">

                            </ul>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div id="background-black"></div>
        <div id="menu-mobile">
            <ul>
                <li class="close">
                    <a href="javascript:void(0)"><i class="fa fa-times" aria-hidden="true"></i></a>
                </li>
                @if (isset($user) && $user)
                    <li>
                        <a href="" class="user-current">
                            <img src="{{ url('upload/avatar/' . $user->avatar) }}" alt="{{ $user->name }}">
                            <span>{{ $user->name }}</span>
                        </a>
                    </li>
                    <li><a href="">Thông tin tài khoản</a></li>
                    <li><a href="">Đơn hàng</a></li>
                    <li><a href="{{ route('get.user.logout', ['token' => \App\Core123\Auth\AuthMe::token('users')]) }}">Đăng xuất</a></li>
                @else
                    <li>
                        <a href="{{ route('get.user.register') }}"><i class="demo-icon icon-fado"></i>Đăng ký</a>
                    </li>
                    <li>
                        <a href="{{ route('get.user.login') }}"><i class="demo-icon icon-document"></i>Đăng nhập</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
{{--    @php--}}
{{--    dd($user)--}}
{{--    @endphp--}}
    <nav class="fs-menu">
        <div class="f-wrap">
            <ul class="fs-mnul clearfix">
                @foreach($menus as $menu)
                    <li>
                        <a href="{{ route('get.brand.index', ['brand' => $menu->bra_slug]) }}" title="{{ $menu->bra_name }}"><i class="{{ $menu->bra_icon }}"></i>{{ $menu->bra_name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </nav>
</header>
