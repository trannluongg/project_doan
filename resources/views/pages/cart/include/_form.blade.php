<form class="ghg-form" id="gh-form" action="{{ route('post.cart.order') }}" method="post">
    <p class="ghg-formtit">Thông tin khách hàng</p>
    <ul class="gh-popfm">
        @if (isset($user) && $user)
            <input type="hidden" name="id" id="uid" value="{{ $user->id ?? ''}}">
            <li>
                <label>Họ và tên: <sup>*</sup></label>
                <div>
                    <input type="text" name="name" id="name" data-error="#error-name" placeholder="Nhập họ và tên" value="{{ $user->name ?? ''}}" required>
                    <div id="error-name"></div>
                </div>
            </li>
            <li>
                <label>Số điện thoại: <sup>*</sup></label>
                <div>
                    <input type="text" name="phone" id="phone" data-error="#error-phone" placeholder="Nhập số điện thoại" value="{{ $user->phone ?? '' }}" required>
                    <div id="error-phone"></div>
                </div>
            </li>
            <li>
                <label>Address: <sup>*</sup></label>
                <div>
                    <input type="text" name="address" id="address" data-error="#error-address" placeholder="Nhập địa chỉ" value="{{ $user->address ?? '' }}" required>
                    <div id="error-address"></div>
                </div>
            </li>
        @else
            <li>
                <label>Họ và tên: <sup>*</sup></label>
                <div>
                    <input type="text" name="uname" id="uname" placeholder="Nhập họ và tên">
                </div>
            </li>
            <li>
                <label>Số điện thoại: <sup>*</sup></label>
                <div>
                    <input type="text" name="uphone" id="uphone" placeholder="Nhập số điện thoại">
                </div>
            </li>
            <li>
                <label>Address: <sup>*</sup></label>
                <div>
                    <input type="text" name="address" id="uaddress" placeholder="Nhập địa chỉ" value="{{ $user->address ?? '' }}" required>
                    {{--                    <p class="gh-popfm-nt">Chi tiết đơn hàng sẽ được gửi vào email</p>--}}
                </div>
            </li>
        @endif
        <li class="ghg-fbots">
            <label></label>
            <div>
                <div class="gfhrows">
                    <p>
                        @if($user)
                            <button type="submit" class="fs-ghggbtn" id="ubtn-order">
                                <strong>Đặt Hàng</strong>
                            </button>
                        @else
                            <a class="fs-ghggbtn" href="#modal-login" rel="modal:open">
                                <strong>Đặt Hàng</strong>
                            </a>
                        @endif
                    </p>
                </div>
            </div>
        </li>
    </ul>
</form>
