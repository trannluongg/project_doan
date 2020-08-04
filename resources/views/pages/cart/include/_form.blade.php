<form class="ghg-form" id="gh-form" novalidate="novalidate">
    <p class="ghg-formtit">Thông tin khách hàng</p>
    <ul class="gh-popfm">
        @if (isset($user) && $user)
            <li>
                <label>Họ và tên: <sup>*</sup></label>
                <div>
                    <input type="text" name="uname" id="uname" placeholder="Nhập họ và tên" value="{{ $user->name ?? ''}}">
                </div>
            </li>
            <li>
                <label>Số điện thoại: <sup>*</sup></label>
                <div>
                    <input type="text" name="uphone" id="uphone" placeholder="Nhập số điện thoại" value="{{ $user->phone ?? '' }}">
                </div>
            </li>
            <li>
                <label>Email: <span>(không bắt buộc)</span></label>
                <div>
                    <input type="text" name="uemail" id="uemail" placeholder="Nhập email" value="{{ $user->email ?? '' }}">
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
                        <button type="button" class="fs-ghggbtn" id="ubtn">
                            <strong>Đặt Hàng</strong>
                        </button>
                    </p>
                </div>
            </div>
        </li>
    </ul>
</form>
