<form class="ghg-form" id="gh-form" action="{{ route('post.cart.order') }}" method="post">
    <p class="ghg-formtit">Thông tin khách hàng</p>
    <ul class="gh-popfm">
        @if (isset($user) && $user)
            <input type="hidden" name="id" id="uid" value="{{ $user->id ?? ''}}">
            <li>
                <label>Họ và tên: <sup>*</sup></label>
                <div>
                    <input type="text" name="name" id="uname" placeholder="Nhập họ và tên" value="{{ $user->name ?? ''}}" required>
                </div>
            </li>
            <li>
                <label>Số điện thoại: <sup>*</sup></label>
                <div>
                    <input type="text" name="phone" id="uphone" placeholder="Nhập số điện thoại" value="{{ $user->phone ?? '' }}" required>
                </div>
            </li>
            <li>
                <label>Address: <sup>*</sup></label>
                <div>
                    <input type="text" name="address" id="uaddress" placeholder="Nhập địa chỉ" value="{{ $user->address ?? '' }}" required>
                    {{--                    <p class="gh-popfm-nt">Chi tiết đơn hàng sẽ được gửi vào email</p>--}}
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
                <label>Email: <span>(không bắt buộc)</span></label>
                <div>
                    <input type="text" name="uemail" id="uemail" placeholder="Nhập email">
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
                            <button type="submit" class="fs-ghggbtn" id="ubtn">
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
